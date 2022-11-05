@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-4">
                <form action="{{ route('boardUpdate') }}" method="post" class="neumorphisme">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="board_id" value="{{$board->id}}">
                    <input type="hidden" name="projet_id" value="{{$board->projet_id}}">
                    <div>
                        <label for="nom">changer le nom de la board </label>
                        <input type="text" name="nom" value="{{$board->nom}}" class="input_neumorphisme">
                    </div>
                    <div>
                        <input type="submit" value="valider" class="btn_valider mt-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
