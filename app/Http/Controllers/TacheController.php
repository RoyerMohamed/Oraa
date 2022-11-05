<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\SousTache;
use App\Models\Tache;
use Illuminate\Http\Request;


class TacheController extends Controller
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
        $tache = Tache::find($request->input('tache_id')); 
        $projet = Projet::find($request->input('projet_id'));
        $soustaches = SousTache::get()->where("tache_id" ,"=" , $tache->id); 
        return view('tache.index' , compact('tache','projet' , "soustaches")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $board_id = $request->input('board_id');
        $projet_id = $request->input('projet_id');
        $datas = array(
            'board_id' => $board_id,
            'projet_id' => $projet_id
        );
        return view("tache.create", compact("datas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $board_id = $request->input('board_id');
        $taches = Tache::get()->where('board_id', "=", $board_id);
        if (count($taches) > 0) {
            Tache::create([
                "nom" => $request->input('nom'),
                "description" =>  $request->input('description'),
                "board_id" =>  $request->input('board_id'),
                "priorite" => $request->input('priorite')[0],
                "status" => $request->input('status')[0],
                "echeance"=> $request->input('echeance'), 
                "ordre" => $taches->last()->ordre + 1
            ]);
            return redirect()->route('kanbanIndex', ['projet_id' => $request->input('projet_id')]);
        } else {
            Tache::create([
                "nom" => $request->input('nom'),
                "description" =>  $request->input('description'),
                "board_id" =>  $request->input('board_id'),
                "priorite" => $request->input('priorite')[0],
                "status" => $request->input('status')[0],
                "echeance"=> $request->input('echeance'), 
                "ordre" => 1
            ]);
            return redirect()->route('kanbanIndex', ['projet_id' => $request->input('projet_id')]);
        }
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
        $tache = Tache::find( $request->input('tache_id'));  
        $projet_id =  $request->input('projet_id'); 
        return view('tache.edit' , compact('tache','projet_id')); 
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
        $tache              = Tache::find( $request->input('tache_id')); 
        $tache->nom         = $request->input('nom'); 
        $tache->description = $request->input('description'); 
        $tache->echeance    = $request->input('echeance'); 
        $tache->priorite    = $request->input('priorite')[0]; 
        $tache->status      = $request->input('status')[0]; 
        $tache->save(); 
        return redirect()->route('kanbanIndex', ['projet_id' => $request->input('projet_id')]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tache = Tache::find( $request->input('tache_id')); 
        $tache->delete(); 
        return redirect()->back()->with('message', 'Votre tache à bien été supprimer'); 
    }
}
