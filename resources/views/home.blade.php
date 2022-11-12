@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="container ">
            <div class="row justify-content-center" id="pourquoi_oraa">
                <div class="col-lg-6 col-md-6 home_title">
                    <h1 data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" class="">Prendre le
                        <span>contrôle</span>
                        de votre <span>travail</span>,
                        n’a jamais été aussi <span>facile</span>
                        en utilisant Oraa.
                    </h1>
                    <p data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000">Découvrez ce que vous pourrez
                        faire avec Oraa, nouvel outil indispensable de l’année 2022 !</p>
                    <button data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000" class="btn btn-primary "><a
                            href="{{ route('register') }}">Lancez-vous, c’est gratuit
                            !</a></button>
                </div>
                <div data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1000"
                    class="col-lg-6 col-md-6 home_hero">
                    <img src="{{ asset('images/hero.png') }}" alt="" srcset="">
                </div>
            </div>
            <div data-aos="fade-up" data-aos-anchor-placement="top-center " data-aos-duration="1300"
                class="row top_box_wrapper "id="top_box_wrapper">
                <hr class="mt-5">
                <div class="top_box">
                    <div class="top_box-title ">
                        <div class="top_box-icon">
                            <img src="{{ asset('images/list_de_projets.png') }}" alt="" srcset="">
                        </div>
                        <span>Liste de projets</span>
                    </div>
                    <div class="row">
                        <p>Créer vos différentes projets en définissez des informations simple et précises. Un titre, une
                            miniaure, une description, une deadline ainsi que des collaborateurs. Vous pourrez créer et
                            gérer vos tâches dans le tableau kanban attitré.

                        </p>
                    </div>
                </div>
                <div class="top_box">
                    <div class="top_box-title ">
                        <div class="top_box-icon">
                            <img src="{{ asset('images/tableau_kanban.png') }}" alt="" srcset="">
                        </div>
                        <span>Tableau Kanban</span>
                    </div>
                    <div class="row">
                        <p>Quel que soit le projet, les tableaux vous garantissent une vison de vos objectifs clairs et
                            précises. L'organisation de vos tâches maximisera votre productivité. Commencez par les tableaux
                            suivants : « À faire », « En cours » et « Terminé ».
                        </p>
                    </div>
                </div>
                <div class="top_box">
                    <div class="top_box-title ">
                        <div class="top_box-icon">
                            <img src="{{ asset('images/list_de_projets.png') }}" alt="" srcset="">
                        </div>
                        <span>Carte des tâches</span>
                    </div>
                    <div class="row">
                        <p>Les cartes représentent vos tâches et peuvent contenir plusieurs informations crusiale à votre
                            travail, le titre, la description, la deadline, les sous-tâches etc... Lors de votre progression
                            dans vos tâches, glissez vos cartes dans les tableaux pour les classer.
                        </p>
                    </div>
                </div>
                <hr>
            </div>
            <div class="fonctionnalites"
                id="fonctionnalites">
                <div data-aos="fade-up" data-aos-anchor-placement="top-center " data-aos-duration="1300"  class="row fonctionnalites-cta">
                    <span>Un projet, une équipe, un but commun</span>
                    <div class="fonctionnalites-cta-btn">
                        <button><a href="{{ route('register') }}">Commencez à agir</a></button>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-anchor-placement="top-center " data-aos-duration="1300"  class="row fonctionnalites-img">
                    <img src="{{ asset('images/fonctionnalites.png') }}" alt="" srcset="">
                </div>
                <div data-aos="fade-up" data-aos-anchor-placement="top-center " data-aos-duration="1300"  class="row fonctionnalites-infos">
                    <div class="fonctionnalites-infos-text">
                        <span>GESTION DE PROJET</span>
                        <h2>Reprenez le contrôle sur votre travail.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                            ut
                            laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                            tatio
                        </p>
                    </div>
                    <div class="fonctionnalites-infos-img">
                        <img src="{{ asset('images/gestion_de_projet.png') }}" alt="" srcset="">
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-anchor-placement="top-center " data-aos-duration="1300"  class="row fonctionnalites-infos">
                    <div class="fonctionnalites-infos-text">
                        <span>GESTION DE PROJET</span>
                        <h2>Reprenez le contrôle sur votre travail.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                            ut
                            laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                            tatio
                        </p>
                    </div>
                    <div class="fonctionnalites-infos-img">
                        <img src="{{ asset('images/control.png') }}" alt="" srcset="">
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-anchor-placement="top-center " data-aos-duration="1300"  class="row fonctionnalites-infos">
                    <div class="fonctionnalites-infos-text">
                        <span>GESTION DE PROJET</span>
                        <h2>Booster votre créativité</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                            ut
                            laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                            tatio
                        </p>
                    </div>
                    <div class="fonctionnalites-infos-img">
                        <img src="{{ asset('images/creativite.png') }}" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row nous_contacter" id="nous_contacter">
            <div data-aos="fade-down" data-aos-anchor-placement="top-center " data-aos-duration="1300"  class="nous_contacter-bandeau">
                <span>Ne perdez pas de vue votre objectif</span>
            </div>
            <div data-aos="fade-up" data-aos-anchor-placement="top-center " data-aos-duration="1300"  class="nous_contacter-form">
                <span>Inscrivez-vous et lancez-vous sur Oraa sans plus attendre. Le travail d'équipe productif vous tend les
                    bras !
                </span>
                <form action="">
                    @csrf
                    <input type="email" name="" class="input_neumorphisme" placeholder="Entre votre e-mail">
                    <button type="submit">Inscription</button>
                </form>
            </div>
        </div>
    </div>
@endsection
