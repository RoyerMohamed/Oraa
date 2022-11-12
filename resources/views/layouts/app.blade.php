<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/5zf7v8uq5kgozgst3zf9a1561bbpmfjuwsr35aezpglmxjvh/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    {{-- jQuery import --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" >
    

    @livewireStyles
</head>

<body>
    <div id="app">
        @php
            $url = Auth::user() ? url('/projet') : url('/');
        @endphp
        @if (!Auth::user())
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm d-flex flex-column">
                <div class="top-bandeau d-none d-lg-flex ">
                    <span>Gérez vos projets en toute sérénité, facilement !</span>
                    <!-- Right Side Of Navbar -->
                    <ul>
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            <li>
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="container">
                    <a class="navbar-brand w" href="{{ $url }}">
                        <img src="{{ asset('images/Logo_oraa.png') }}" alt="logo oraa" style="max-width: 150px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="#pourquoi_oraa">Pourquoi Oraa ?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#fonctionnalites">Fonctionnalités</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#nous_contacter">Nous contacter</a>
                            </li>
                            <li class="d-block d-lg-none nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="d-block d-lg-none nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        <div class="container-fluid text-center">
            @if (session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <main class="d-flex">
            @if (Auth::user())
                @livewire('nav-bar')
            @endif
            @yield('content')
        </main>
    </div>
    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="footer-top-box">
                    <img src="{{ asset('images/Logo_oraa.png') }}" alt="logo oraa" style="max-width: 150px">
                </div>
                <div class="footer-top-box">
                    <span><a href="#pourquoi_oraa">Pourquoi Oraa ?</a></span>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
                <div class="footer-top-box">
                    <span> <a href="#fonctionnalites">Fonctionnalités</a> </span>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
                <div class="footer-top-box">
                    <span>Nous contacter</span>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <span>Politique de confidentialité</span>
                <span>Paramètres de cookies</span>
                <span>Copyright © 2022 Oraa</span>
            </div>
        </div>
    </footer>
    @livewireScripts
  
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    </body>

</html>
