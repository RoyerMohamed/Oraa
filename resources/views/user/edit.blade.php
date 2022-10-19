@extends('layouts.app')

@section('content')
    <div class=" profil_edit container-fluid">
        <form action="{{route('updateInfos')}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row justify-content-between mb-5" style="height: 25vh">
                <div class="profil_edit-import d-flex  neumorphisme ">
                    <div class="col-lg-8 profil_edit-import-img ">
                        <input type="file" id="user_thumnail" hidden name="image"/>
                        <img id="user_thumnail_img" src="{{Storage::url($user->image_name)}}" alt="" />
                        <div>
                            <span>Importer votre photo de profil</span>               
                            <p>La photo aide vos collaborateurs à vous reconnaître dans Oraa.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 profil_edit-import-btn ">
                        <label for="user_thumnail">Importer votre photo de profil</label>               
                    </div>
                </div>
                <div class=" profil_edit-info neumorphisme ">
                    <div class="profil_edit-info-lbl">
                        <span>Informations</span>
                    </div>
                    <div class="profil_edit-info-input">
                        <label for="pseudo">Pseudo : </label>
                        <input class="input_neumorphisme" name="pseudo" type="text" value="{{ $user->pseudo }}">
                    </div>
                    <div class="profil_edit-info-input">
                        <label for="email">E-mail : </label>
                        <input class="input_neumorphisme" name="email" type="email" value="{{ $user->email }}">
                    </div>
                    <div class="profil_edit-info-input">
                        <label for="metier">Profession: </label>
                        <input class="input_neumorphisme" name="metier" type="text" value="{{ $user->metier }}">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 neumorphisme" style="height: 25vh">
                    <div class="profil_edit-apropos">
                        <label for="apropos">A Propos</label>
                        <textarea name="apropos" class="input_neumorphisme" id="" cols="100" rows="5" >{{$user->apropos}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-12 d-flex justify-content-around mt-4 w-25">
                    <button type="submit" class="btn_valider"> Mettre à jour </button>
                    <button type="submit" class="btn_annuler"> Annuler </button>
                </div>
            </div>
        </form>

        <form action="{{route('updatepassword')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-lg-12 profil_edit-password neumorphisme mt-5">
                    <div class="row">
                        <div class="profil_edit-password-title">
                            <span>Modifier le mot de passe</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="profil_edit-password-input col-lg-4">
                            <label for="ancien_mdp">Mot de passe actuel :</label>
                            <input class="input_neumorphisme" name="ancien_mdp" type="password" >
                        </div>
                        <div class="profil_edit-password-input col-lg-4">
                            <label for="Nouveau_mdp">Nouveau mot de passe :</label>
                            <input class="input_neumorphisme" name="Nouveau_mdp" type="password">
                        </div>
                        <div class="profil_edit-password-input col-lg-4">
                            <label for="confime_nouveau_mdp">Confirmation du mot de passe :</label>
                            <input class="input_neumorphisme" name="confime_nouveau_mdp" type="password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-12 d-flex justify-content-around mt-4 w-25">
                    <button type="submit" class="btn_valider"> Changer le mot de passe</button>
                    <button type="submit" class="btn_annuler"> Annuler</button>
                </div>
            </div>  
        </form>
    </div>
@endsection
