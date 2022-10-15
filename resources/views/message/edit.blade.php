@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('messageUpdate')}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="message_id" value="{{$message->id}}">
        <label for="message">modifier le message</label>
        <div class="row">
            <div class="col">
                <input type="text" name="message" value="{{$message->contenu}}">
            </div>
            <div class="col">
                <label for="image">image</label>
                <input type="file" name="image" value="{{$message->image}}">
            </div>
            <div>
                <input type="submit" value="valider">
            </div>
        </div>
        </form>
</div>
@endsection
