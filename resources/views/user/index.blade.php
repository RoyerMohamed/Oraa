@extends('layouts.app')

@section('content')
    <div class=" profil">

        <div class="profil-header">
            <div class="row profil-header-wrapper">
                <div class="col-lg-1 img">
                    <img src="{{ asset('images/default_user.jpg') }}" alt="" srcset="" width="50px">
                </div>
                <div class="col-lg-2 pseudo">
                    <span>{{ $user->pseudo }}</span>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-lg-12 profil-header-btn">
                    <a href="{{route('profil_edit')}}" class="btn-edit"> modifier</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">

                <div class="col-3">

                    <div class=" profil-info">
                        <div class="profil-info-title">
                            <p>Compléte ton profil</p>
                        </div>
                        <div class="profil-info-pseudo" >
                        </div>

                    </div>
                    <div class=" profil-info">
                        <div class="profil-info-title">
                            <p>information</p>
                        </div>
                        <div class="profil-info-pseudo">
                            <p>pseudo : {{ $user->pseudo }}</p>
                        </div>
                        <div class="profil-info-email">
                            <p>email : {{ $user->email }}</p>
                        </div>
                        <div class="profil-info-work">
                            <p>work : {{ $user->metier }}</p>
                        </div>
                    </div>

                </div>

                <div class="col-9">

                    <div class=" profil-about">
                        <div class="profil-about-title">
                            <p>a propos</p>
                        </div>
                        <div class="profil-about-text">
                            <p> {{ $user->apropos }}</p>
                        </div>
                    </div>
                    <div class="profil-projet">
                        <div class="profil-about-title">
                            <p>projet</p>
                        </div>
                        <div class=" d-flex justify-content-between profil-about-text">
                            @foreach ($user->projets as $projet)
                            <div class="col-lg-3 ">
                                <p>{{$projet->nom }}</p>
                                 {{$projet->description}}
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>




    </div>
@endsection
