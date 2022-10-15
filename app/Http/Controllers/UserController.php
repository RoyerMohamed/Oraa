<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->load('projets');
        return view('user.index', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function updateInfos(Request $request)
    {
        $request->validate([
            'pseudo' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50',
            'metier' => 'min:3|max:50',
            'apropos' => 'min:3|max:50',
        ]);

        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route('profil')->with('message', 'vos information ont bien été modifié');
    }

    public function updatepassword(Request $request)
    {

        $request->validate([
            'ancien_mdp' => ['required'],
            'Nouveau_mdp' => ['required', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()],
            'confime_nouveau_mdp' => ['required', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()],
        ]);

        $user = Auth::user();
        if (Hash::check($request->input('ancien_mdp'), $user->password)) {
            if ($request->input('ancien_mdp') !== $request->input('Nouveau_mdp')) {
                if ($request->input('Nouveau_mdp') === $request->input('confime_nouveau_mdp')) {
                    $user->password = Hash::make($request->input('Nouveau_mdp'));
                    $user->save();
                    return redirect()->route('profil_edit')->with('message', 'Votre mot de passe a bien été modifié');
                } else {
                    return redirect()->back()->withErrors('Votre nouveau mot de passe ne correspond pas avec la confirmation !');
                }
            } else {
                return redirect()->back()->withErrors('Votre nouveau mot de passe est identique avec ancien');
            }
        } else {
            return redirect()->back()->withErrors('Votre mot de passe actuel ne correspond pas ! ');
        }
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
