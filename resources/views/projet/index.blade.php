@extends('layouts.app')

@section('content')
    <div class="">
        <a class="btn btn-dark" href="{{ route('projetCreate') }}">{{ __('Crée un projet') }}</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach ($projets as $projet)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $projet->nom }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $projet->echeance }}</h6>
                        <p class="card-text">{{ $projet->description }}</p>
                        <a href="#" class="card-link">{{ $projet->image }}</a>
                        @foreach ($projet->users as $user)
                            <a href="#" class="card-link">{{ $user->pseudo }}</a>
                        @endforeach
                        <form action="{{route('projetDestroy')}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="projet_id" value="{{$projet->id}}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>

                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown link
                            </a>
                          
                            <ul class="dropdown-menu">
                              <li>
                               <form action="{{route('projetShow')}}" method="get">
                                @csrf
                                <input type="hidden" name="projet_id" value="{{$projet->id}}">
                                <input type="submit"  value="voir details">
                            </form>
                            </li>
                              <li>
                                <form action="{{route('projetEdit')}}" method="get">
                                    @csrf
                                    <input type="hidden" name="projet_id" value="{{$projet->id}}">
                                    <input type="submit"  value="modifier le projet">
                                </form>
                              </li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
