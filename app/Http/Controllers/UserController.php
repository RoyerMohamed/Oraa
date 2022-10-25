<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();
        $request->validate([
            'pseudo' => 'min:3|max:50',
            'email' => 'min:3|max:50',
            'metier' => 'max:50',
            'apropos' => 'max:500',
        ]);

        if ($request->hasFile('image') ) {
            $file_name = time() . '.' .  $request->file('image')->extension();
            if($file_name != $user->image_name ){
                $path = $request->file('image')->storeAs(
                    'images',
                    $file_name,
                    'public'
                );
                $user->update([
                "pseudo" => $request->input('pseudo'),
                "image_name" => $path,
                "metier" => $request->input('metier'),
                "email" => $request->input('email'),
                "apropos" => $request->input('apropos'),
                ]);
                $user->save();
                return redirect()->route('profil')->with('message', 'vos information ont bien été modifié');
            }else{
                $user->update([
                    "pseudo" => $request->input('pseudo'),
                    "metier" => $request->input('metier'),
                    "email" => $request->input('email'),
                    "apropos" => $request->input('apropos'),
                    ]);
                    $user->save();
                    return redirect()->route('profil')->with('message', 'vos information ont bien été modifié');
            }


        }
        else{
            $user->update([
                "pseudo" => $request->input('pseudo'),
                "metier" => $request->input('metier'),
                "email" => $request->input('email'),
                "apropos" => $request->input('apropos'),
                ]);
                $user->save();
                return redirect()->route('profil')->with('message', 'vos information ont bien été modifié');
        }
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
