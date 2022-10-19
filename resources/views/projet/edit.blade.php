@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{route('projetUpdate')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="projet_id" value="{{$projet->id}}">
            <div class="col-lg-3 ">
                <div class="">
                    <label for="nom">Titre du projet : </label>
                    <input name="nom" type="text" value="{{$projet->nom}}" >
                </div>
                <div class=""> 
                    <input type="file" id="user_thumnail" hidden name="image"/>
                    <img id="user_thumnail_img" src="{{Storage::url($projet->image)}}" alt="" />
                    <label for="user_thumnail">Image miniature :</label> 
                </div>
                <div class="">
                    <label for="description">Description du Projet: </label>
                    <textarea name="description" id="" cols="30" rows="10">{{$projet->description}}</textarea>
                </div>
              
                <div class="">
                    <label for="echeance">echeance: </label>
                    <input type="date" name="echeance" id="" value="{{$projet->echeance}}">
                </div>
{{-- 
    en thumbnail afficher les user du projet avec btn plus 
    afficher tous les user dans le drop down avec rouge si deja prsant dans le projet 
    --}}


                @foreach ($users as $user)
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="projet_users[]"  value="{{$user->id}}">
                    <label class="form-check-label" for="flexSwitchCheckDefault">{{$user->pseudo}}</label>
                </div>
                @endforeach

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
