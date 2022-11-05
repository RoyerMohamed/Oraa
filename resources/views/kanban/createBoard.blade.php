@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-4">
                <form action="{{ route('boardStore') }}" method="POST" class=" neumorphisme ">
                    @csrf
                    <input type="hidden" name="projet_id" value="{{ $projet_id }}">
                    <div class="d-flex justify-content-between pb-3">
                        <label for="nom"> Nom du board : </label>
                        <input type="text" name="nom" class="input_neumorphisme">
                    </div>
                    <div>
                        <input type="submit" class="btn_valider">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
