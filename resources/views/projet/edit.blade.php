@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{route('projetStore')}}" method="get">
            @csrf
            <div class="col-lg-3 ">
                
                <div class="">
                    <label for="nom">Titre du projet : </label>
                    <input name="nom" type="text" value="{{$projet->nom}}" >
                </div>
                <div class="">
                    <label for="image">Image miniature : </label>
                    <input name="image" type="file" value="{{$projet->image}}">
                </div>
                <div class="">
                    <label for="description">Description du Projet: </label>
                    <textarea name="description" id="" cols="30" rows="10">{{$projet->description}}</textarea>
                </div>
              
                <div class="">
                    <label for="echeance">echeance: </label>
                    <input type="date" name="echeance" id="" value="{{$projet->echeance}}">
                </div>
                <div class="">
                    <button type="submit">valider</button>
                </div>
                
            </div>
            
        </form>
        
        @foreach ($projet->users as $key => $user)
        <div class="">
            <span>{{$user->pseudo}}</span>
            <form action="{{route("deleteProjectUser")}}" method="POST" >
                @csrf
                @method("DELETE")
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input type="hidden" name="projet_id" value="{{$projet->id}}">
                <input type="submit" value="X">
            </form>
        </div>
    @endforeach

       
        
    </div>
@endsection
