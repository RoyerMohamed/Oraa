@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{route('projetStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-3 ">
                <div class="">
                    <label for="nom">Titre du projet : </label>
                    <input name="nom" type="text" >
                </div>
                <div class="">
                    <input type="file" id="user_thumnail" hidden name="image"/>
                    <img id="user_thumnail_img" src="" alt="" style="width: 30%" />
                    <label for="user_thumnail"><i class="fas fa-plus"></i></label>  
                </div>
                <div class="">
                    <label for="description">Description du Projet: </label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="">
                    <label for="echeance">echeance: </label>
                    <input type="date" name="echeance" id="">
                </div>
                <div class="">
                    <button type="submit">valider</button>
                </div>
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
