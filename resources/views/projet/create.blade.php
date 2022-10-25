@extends('layouts.app')

@section('content')
    <div class="container-fluid projet_create ">
        <form action="{{route('projetStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="projet_create-wrapper">
                <div class="projet_create-info neumorphisme">
                    <div class="projet_create-info-nom ">
                        <label for="nom">Titre du projet : </label>
                        <input name="nom" type="text" class="input_neumorphisme" placeholder="Entrer le titre du projet">
                    </div>
                    <div class="projet_create-info-img">
                        <label for="">Entrer le titre du projet</label>  
                        <input type="file" id="" name="image"/>
                    </div>
                    <div class="projet_create-info-desc">
                        <label for="description">Description du Projet: </label>
                        <textarea name="description" id="test" cols="30" rows="10" ></textarea>
                    </div>
                    <div class="projet_create-info-date">
                        <label for="echeance">echeance: </label>
                        <input type="date" name="echeance" class="input_neumorphisme" placeholder="Entrer la date limite">
                    </div>
                </div>
                <div class="projet_create-btn">
                    <div class="projet_create-btn-wrapper">
                        <button type="submit" class="btn_valider">valider</button>
                        <button type="submit" class="btn_annuler">annuler</button>
                    </div>
                </div>
            </div>
            <livewire:menber-manager />
        </form>
    </div>
@endsection
