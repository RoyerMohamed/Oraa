@extends('layouts.app')

@section('content')
    <div class=" profil">
        @php
            $pregress_bar = 40;
            switch ($user) {
                case !empty($user->apropos):
                    $pregress_bar += 20;
                case !empty($user->image_name):
                    $pregress_bar += 20;
                case !empty($user->metier):
                    $pregress_bar += 20;
                    break;
            
                default:
                    $pregress_bar = 40;
            }
            
            $image = !empty($user->image_name) ? Storage::url($user->image_name) : asset('/images/default_user.jpg');
        @endphp
        <div class="profil-header">
            <div class="row w-100 h-100">
                <div class="col-md-6 profil-thumbnail">
                    <img src="{{ $image }}" alt="userThumbnail">
                    <div class="profil-thumbnail-text">
                        <span>{{ $user->pseudo }}</span>
                    </div>
                </div>
                <div class="col-md-6 profil-header-btn">
                    <a href="{{ route('profil_edit') }}" class="btn-edit"> <i class="fas fa-edit"></i>Modifier</a>
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-around">
            <div class="profil-wrapper">

                <div class="profil-wrapper-left ">

                    <div class=" profil-info pl-3">
                        <div class="profil-info-title neumorphisme">
                            <p>Compléte ton profil</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ $pregress_bar }}%"></div>
                            </div>
                        </div>
                        <div class="profil-info-pseudo">
                        </div>

                    </div>
                    <div class=" profil-info neumorphisme pl-4">
                        <div class="profil-info-title">
                            <p>information</p>
                        </div>
                        <div class="profil-info-text">
                            <p>Pseudo : </p><span>{{ $user->pseudo }}</span>
                        </div>
                        <div class="profil-info-text">
                            <p>E-mail : </p><span>{{ $user->email }}</span>
                        </div>
                        <div class="profil-info-text">
                            <p>Professsion : </p><span>{{ $user->metier }}</span>
                        </div>
                    </div>

                </div>

                <div class="profil-wrapper-right">
                    <div class=" profil-about neumorphisme">
                        <div class="profil-about-title">
                            <p>A propos</p>
                        </div>
                        <div class="profil-about-text">
                            <p> {{ $user->apropos }}</p>
                        </div>
                    </div>
                    <div class="profil-projet neumorphisme">
                        <div class="profil-projet-title">
                            <p>Projets récents</p>
                        </div>
                        <div class=" d-flex justify-content-around h-75 profil-projet-list" >
                            @foreach ($user->projets as $projet)
                                <div class=" neumorphisme  profil-projet-card col-lg-12">
                                    <form action="{{route('projetShow')}}" method="get">
                                        <input type="hidden" name="projet_id" value="{{$projet->id}}">
                                        <button type="submit"  class="submit_btn">
                                            {{ $projet->nom }}
                                            </button>
                                    </form>
                                    <div class="profil-projet-card-menbres">
                                       <p>Membres :</p> 
                                    <div class="avatars ">
                                        @foreach ($projet->users as $projet_user)
                                            <span class="avatar">
                                                <img src="{{ Storage::url($projet_user->image_name) }}" alt=""
                                                    srcset="">
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
