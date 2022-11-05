<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Projet;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth"); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projet_id = $request->input('projet_id'); 
        $projet = Projet::find($projet_id); 
        $boards = Board::orderBy('ordre')->where('projet_id', "=" , $projet_id)->get(); 
        return view("kanban.index" , compact("boards", "projet")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $projet_id =  $request->input("projet_id");  
        return view('kanban.createBoard', compact('projet_id')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $projet = Projet::find( $request->input("projet_id")); 
       $boards =  Board::get()->where("projet_id" , "=",$request->input("projet_id"));
        if(count($boards)<= 0){
            Board::create([
                "nom" => $request->input("nom"), 
                "projet_id" => $request->input("projet_id"),
                "ordre" => 1
            ]); 
        }else{
            Board::create([
                "nom" => $request->input("nom"), 
                "projet_id" => $request->input("projet_id"),
                "ordre" => $boards->last()->ordre + 1
            ]);  
        }
        return redirect()->route('kanbanIndex', ['projet_id' => $request->input("projet_id")]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $board = Board::find($request->input('board_id')); 
       return view('kanban.editBoard' , compact('board')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $board      = Board::find($request->input('board_id'));
        $board->nom = $request->input('nom'); 
        $board->save(); 
        return redirect()->route('kanbanIndex' , ["projet_id" => $request->input('projet_id') ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $board      = Board::find($request->input('board_id'));
        $board->delete();
        return redirect()->back()->with('message', 'Votre board à bien été supprimer');
    }
}
