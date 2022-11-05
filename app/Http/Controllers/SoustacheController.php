<?php

namespace App\Http\Controllers;

use App\Models\SousTache;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Source;

class SoustacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $tache_id = $request->input('tache_id'); 
         $projet_id = $request->input('projet_id'); 
         return view('soustache.create', compact('tache_id', 'projet_id')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tache_id = $request->input('tache_id'); 
        $projet_id = $request->input('projet_id');
        SousTache::create([
            "nom" => $request->input('nom'), 
            "status" => 0, 
            "tache_id" => $tache_id
        ]);
        return redirect()->route('tacheIndex', ["projet_id"=>$projet_id , "tache_id" => $tache_id]); 
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
