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
    public function create()
    {
        //
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
        return redirect()->back(); 
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
