@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-4 neumorphisme  ">
            <form action="{{route('soustacheStore')}}" class="d-flex justify-content-around" method="post">
                @csrf
                <input type="hidden" name="tache_id" value="{{$tache_id}}">
                <input type="hidden" name="projet_id" value="{{$projet_id}}">
                <div class="">
                    <label for="nom"> nom de la tache :     </label>
                    <input type="text" name="nom" >
                </div>
                <input type="submit" value="ajouter">
            </form>
        </div>
    </div>
</div>
@endsection
