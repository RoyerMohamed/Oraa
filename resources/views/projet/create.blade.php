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
                    <div class="">
                        <label for="echeance">echeance: </label>
                        <input type="date" name="echeance" id="">
                    </div>
                </div>
                <div class="projet_create-btn">
                    <div class="">
                        <button type="submit">valider</button>
                    </div>
                </div>
            </div>
            <div class="projet_create-users neumorphisme">
                @foreach ($users as $key => $user)
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="projet_users[]"  value="{{$user->id}}">
                    <label class="form-check-label" for="flexSwitchCheckDefault">{{$user->pseudo}}</label>
                </div>
                @endforeach
            </div>
        </form>
    </div>
@endsection
