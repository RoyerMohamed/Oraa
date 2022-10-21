<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperé uniquemnt les projet de user acctuel ou les projet ou il fait partie
        $projets = Projet::get()->load('users');
        return view("projet.index", compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view("projet.create", compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd();
        $request->validate([
            'nom' => 'required|min:3|max:50',
            'description' => 'required|min:3|max:500',
        ]);

        if ($request->hasFile('image')) {
            $file_name = time() . '.' .  $request->file('image')->extension();
            if ($file_name != $request->file('image')->getClientOriginalName()) {
                $path = $request->file('image')->storeAs(
                    'images',
                    $file_name,
                    'public'
                );
                $projet = Projet::create([
                    'nom' => $request->input('nom'),
                    'image' => $path,
                    'description' => strip_tags($request->input('description')),
                    'echeance' => $request->input('echeance')
                ]);
                $last_insert_projet = Projet::find($projet->id);
                $users = $request->input('projet_users');
                foreach ($users as $user_id) {
                    $last_insert_projet->users()->attach($user_id);
                }
                return redirect()->route('projet')->with('message', 'Votre projet à bien été créé');
            } else {
                $projet = Projet::create([
                    'nom' => $request->input('nom'),
                    'image' => null,
                    'description' => strip_tags($request->input('description')),
                    'echeance' => $request->input('echeance')
                ]);
                $last_insert_projet = Projet::find($projet->id);
                $users = $request->input('projet_users');
                foreach ($users as $user_id) {
                    $last_insert_projet->users()->attach($user_id);
                }
                return redirect()->route('projet')->with('message', 'Votre projet à bien été créé');
            }
        } else {
            $projet = Projet::create([
                'nom' => $request->input('nom'),
                'image' => asset("/images/default_user.jpg"),
                'description' => strip_tags($request->input('description')),
                'echeance' => $request->input('echeance')
            ]);
            $last_insert_projet = Projet::find($projet->id);
            $users = $request->input('projet_users');
            foreach ($users as $user_id) {
                $last_insert_projet->users()->attach($user_id);
            }
            return redirect()->route('projet')->with('message', 'Votre projet à bien été créé');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $projet = Projet::find($request->input("projet_id"))->load('users', 'messages');
        return view('projet.details', compact('projet'));
    }
    //how to create new vue.js project ?

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        $projet = Projet::find($request->input("projet_id"));
        $projet->load('users');
        $users = User::all();
        return view("projet.edit", compact("projet", "users"));
    }

    // Delete user from the projet 

    public function deleteProjectUser(Request $request)
    {
        $projet = Projet::find($request->input('projet_id'));
        $projet->users()->detach($request->input('user_id'));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        $projet = Projet::find($request->input("projet_id"));
        $projet->nom = $request->input("nom");
        $projet->description = strip_tags($request->input('description'));
        $projet->echeance = $request->input("echeance");
        if($request->hasFile('image')){
            $file_name = time() . '.' .  $request->file('image')->extension();
            $path = $request->file('image')->storeAs(
                'images',
                $file_name,
                'public'
            );
            $projet->image = $path;
        }

        //ajoue de user uniquement si il nest pas deja presant
        if (!empty($request->input('projet_users'))) {
            $users = $request->input('projet_users');
            foreach ($users as $user_id) {
                $projet->users()->attach($user_id);
            }
        }
        $projet->save(); 

        return redirect()->back();
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $projet = Projet::find($request->input("projet_id"));
        $projet->delete();
        return redirect()->route('projet')->with('message', 'Votre projet à bien été supprimer');
    }
}
