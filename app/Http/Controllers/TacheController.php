<?php

namespace App\Http\Controllers;

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
                "priorite" => "Urgent",
                "status" => "A faire",
                "echeance"=> $request->input('echeance'), 
                "ordre" => $taches->last()->ordre + 1
            ]);
            return redirect()->route('kanbanIndex', ['projet_id' => $request->input('projet_id')]);
        } else {
            Tache::create([
                "nom" => $request->input('nom'),
                "description" =>  $request->input('description'),
                "board_id" =>  $request->input('board_id'),
                "priorite" => "Urgent",
                "status" => "A faire",
                "echeance"=> $request->input('echeance'), 
                "ordre" => 1
            ]);
            return redirect()->route('kanbanIndex', ['projet_id' => $request->input('projet_id')]);
        }
    }




    public function updateOrder(Request $request){
        // foreach ($request->order as $key => $order) {
        //     $post = Tache::find($order['id'])->update(['ordre' => $order['order']]);
        // }

        // return response('Update Successfully.', 200);
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
