@extends('layouts.app')

@section('content')
    <div class="container-fluid projet_create d-flex ">
        <form class=" mt-5" action="{{ route('tacheUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="tache_id" value="{{ $tache->id }}">
            <input type="hidden" name="projet_id" value="{{ $projet_id }}">
            <div class="projet_create-wrapper">
                <div class="projet_create-info neumorphisme">
                    <div class="projet_create-info-nom ">
                        <label for="nom">Titre du tache : </label>
                        <input name="nom" type="text" class="input_neumorphisme"
                            placeholder="Entrer le titre du projet" name="nom" value="{{ $tache->nom }}">
                    </div>
                    <div class="projet_create-info-img">
                        <label for="">Image de la tache</label>
                        <input type="file" id="" name="image" />
                    </div>
                    <div class="projet_create-info-desc">
                        <label for="description">Description de la tache: </label>
                        <textarea name="description" id="test" cols="30" rows="10">{{ $tache->description }}</textarea>
                    </div>
                    <div class="projet_create-info-date">
                        <label for="echeance">echeance de la tache: </label>
                        <input type="date" name="echeance" class="input_neumorphisme" placeholder="Entrer la date limite"
                            value="{{ $tache->echeance }}">
                    </div>
                </div>
                <div class="projet_create-btn">
                    <div class="projet_create-btn-wrapper">
                        <button type="submit" class="btn_valider">valider</button>
                        <button type="submit" class="btn_annuler">annuler</button>
                    </div>
                </div>
            </div>
            <div class="profil_edit-selects">
                <div class="neumorphisme profil_edit-selects-priorite">
                    <label for="priorité-select">Priorité : </label>

                    <select id="priorité-select" class="input_neumorphisme" name="priorite[]" required>
                        <option value="">--Choisir une priorité--</option>
                        <option value="Urgent">Urgent</option>
                        <option value="Important">Important</option>
                        <option value="Normal">Normal</option>
                    </select>

                </div>
                <div class="neumorphisme profil_edit-selects-status">
                    <label for="priorité-select">Status : </label>

                    <select id="priorité-select"class="input_neumorphisme" name="status[]" required>
                        <option value="">--Choisir une status--</option>
                        <option value="A faire">A faire</option>
                        <option value="En cours">En cours</option>
                        <option value="En revue">En revue</option>
                        <option value="Terminier">Terminier</option>
                    </select>

                </div>
            </div>
        </form>

    </div>
@endsection
