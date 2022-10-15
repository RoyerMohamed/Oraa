@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 projet-header">
                <p> {{$projet->nom}} </p>
                <p>projet image {{$projet->image}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <p>DESCRIPTION DU PROJET</p>
                <p>{{$projet->description }}</p>
            </div>
            <div class="col-lg-4">
                @foreach ($projet->users as $user)
                  <p>images {{$user->image}} nom {{$user->pseudo}}</p>   
                @endforeach
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">

                @if (count($projet->messages) > 0)
                @foreach ($projet->messages as $message)
                <div>
                    <p>{{$message->contenu}}</p>   
                    <p>{{$message->image}}</p>   
                    <form action="{{route('messageDestroy')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="message_id" value="{{$message->id}}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    <form action="{{route('messageEdit')}}" method="get">
                        @csrf
                        <input type="hidden" name="message_id" value="{{$message->id}}">
                        <button type="submit" class="btn btn-primary">
                            edit
                        </button>
                    </form>
                </div>
                                     
                @endforeach
                @else
                <form action="{{route('messageStore')}}" method="post">
                    @csrf
                    
                    <label for="message">ajouter un messages</label>
                    <input type="hidden" name="projet_id" value="{{$projet->id}}" >
                    <div class="row">
                        <div class="col">
                            <input type="text" name="message">
                        </div>
                        <div class="col">
                            <label for="image">image</label>
                            <input type="file" name="image">
                        </div>
                        <div>
                            <input type="submit" value="valider">
                        </div>
                    </div>
                    </form>
                @endif

               
            </div>
        </div>
        
    </div>
@endsection
