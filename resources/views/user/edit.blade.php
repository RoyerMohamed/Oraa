@extends('layouts.app')

@section('content')
    @php
        //dd($user)
    @endphp

    <div class=" container-fluid">
        <form action="{{route('updateInfos')}}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    <div class="profil-edit-card-img">
                        <img src="{{ asset('images/default_user.jpg') }}" alt="" width="50px" srcset="">
                    </div>
                    <div class="profil-edit-card-lbl">
                        <span>Importer votre photo de profil</span>
                        <p>La photo aide vos collaborateurs à vous reconnaître dans Distello.</p>
                    </div>
                    <div class="profil-edit-card-import">
                        <input name="image" type="file">
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="profil-edit-card-lbl">
                        <span>Informations</span>
                    </div>
                    <div class="profil-edit-card-input">
                        <label for="pseudo">Pseudo : </label>
                        <input name="pseudo" type="text" value="{{ $user->pseudo }}">
                    </div>
                    <div class="profil-edit-card-input">
                        <label for="email">E-mail : </label>
                        <input name="email" type="email" value="{{ $user->email }}">
                    </div>
                    <div class="profil-edit-card-input">
                        <label for="metier">Profession: </label>
                        <input name="metier" type="text" value="{{ $user->metier }}">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="profil-edit-card-apropos">
                        <label for="apropos">A Propos</label>
                        <textarea name="apropos" id="" cols="100" rows="5" >{{$user->apropos}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-lg-12 profil-header-btn">
                    <button type="submit" class="btn-edit"> valider informations </button>
                </div>
            </div>
        </form>

        <form action="{{route('updatepassword')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-lg-12 profil-edit-card-password ">
                    <div class="row">
                        <div class="profil-edit-card-password-title">
                            <span>Modifier le mot de passe</span>
                        </div>
                    </div>
                    <div class="row profil-edit-card-password-inputs">
                        <div class="profil-edit-card-password-input col-lg-4">
                            <label for="ancien_mdp">Mot de passe actuel:</label>
                            <input name="ancien_mdp" type="password" >
                        </div>
                        <div class="profil-edit-card-password-input col-lg-4">
                            <label for="Nouveau_mdp">Nouveau mot de passe:</label>
                            <input name="Nouveau_mdp" type="password">
                        </div>
                        <div class="profil-edit-card-password-input col-lg-4">
                            <label for="confime_nouveau_mdp">Confirmation du mot de passe:</label>
                            <input name="confime_nouveau_mdp" type="password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-lg-12 profil-header-btn">
                    <button type="submit" class="btn-edit"> valider mot de passe</button>
                </div>
            </div>  
        </form>
    </div>
@endsection
