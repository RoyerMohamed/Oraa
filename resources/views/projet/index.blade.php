@extends('layouts.app')

@section('content')
    <div class="container-fluid projet_list">
        <div class="row">
            <div class="col-lg-3 after_herder">
                <a class="lien_valider" href="{{ route('projetCreate') }}">{{ __('+ Crée') }}</a>
            </div>
        </div>
        <div class="row justify-content-around">
            @foreach ($projets as $projet)
                <div class="projet_list-card neumorphisme">
                    <div class="projet_list-card-option">
                            <button class="" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{ route('projetShow') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                        <button type="submit" value="voir details"><i class="fas fa-eye"></i> <span>Voir</span></button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('kanbanIndex') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                        <button type="submit" value="voir kanban"><i class="fas fa-eye"></i> <span>kanban</span></button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('projetEdit') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                        <button type="submit" value="modifier le projet"><i class="fas fa-pen"></i> Modifier</button>
                                    </form>
                                </li>
                                <li><form action="{{ route('projetDestroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                    <button type="submit" class="">
                                        <i class="fas fa-trash-alt"></i>Supprimer
                                    </button>
                                </form></li>
                            </ul>
                    </div>
                    <div class="projet_list-card-top">

                        <div class="projet_list-card-top-img">
                            <img src="{{ Storage::url($projet->image) }}" alt="" srcset="">
                        </div>
                        <div class="projet_list-card-top-text">
                            <span>{{ $projet->nom }}</span>
                            <p>{{ $projet->description }}</p>
                        </div>
                    </div>
                    <div class="projet_list-card-bottom">
                        <div class="avatars ">
                            @foreach ($projet->users as $projet_user)
                                <span class="avatar">
                                    <img src="{{ Storage::url($projet_user->image_name) }}" alt=""
                                        srcset="">
                                </span>
                            @endforeach
                        </div>
                        <div>
                            <span> <i class="fas fa-calendar"></i> {{ $projet->echeance }}</span>
                        </div>
                    </div>

                </div>

                {{-- <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $projet->nom }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $projet->echeance }}</h6>
                        <p class="card-text">{{ $projet->description }}</p>
                        <a href="#" class="card-link">{{ $projet->image }}</a>
                        @foreach ($projet->users as $user)
                            <a href="#" class="card-link">{{ $user->pseudo }}</a>
                        @endforeach
                        <form action="{{ route('projetDestroy') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>

                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{ route('projetShow') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                        <input type="submit" value="voir details">
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('projetEdit') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                        <input type="submit" value="modifier le projet">
                                    </form>
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            @endforeach

        </div>
    </div>
@endsection
