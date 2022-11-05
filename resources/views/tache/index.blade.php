@extends('layouts.app')

@section('content')
    <div class="container-fluid tache">
        <div class="tache-wrapper">
            <div class="col-3 tache-details ">
                <div class="tache-details-timer neumorphisme">
                    <span>Suivi des délais</span>
                    <div class="tache-details-timer-info">
                        <i class="far fa-clock"></i>
                        <span>{{ $tache->echeance }}</span>
                        <span>{{ $tache->nom }}</span>
                    </div>
                </div>
                <div class="tache-details-info neumorphisme">
                    <div classs="tache-details-info-text">
                        <span>Tache N°</span>
                        <span>#OA{{ $tache->id }}</span>
                    </div>
                    <div classs="tache-details-info-text">
                        <span>Titre de la tâche</span>
                        <span>{{ $tache->nom }}</span>
                    </div>
                    <div classs="tache-details-info-text">
                        <span>Nom du projet</span>
                        <span>{{ $projet->nom }}</span>
                    </div>
                    <div classs="tache-details-info-text">
                        <span>Échéance</span>
                        <span>{{ $tache->echeance }}</span>
                    </div>
                </div>
            </div>
            <div class="col-8 ">
                <div class="tache-description neumorphisme">
                    <div class="text"><span>DESCRIPTION DE LA TÂCHE</span><p>{{strip_tags($tache->description)}}</p></div>
                    <div class="soustache">
                        <span>SOUS-TÂCHES</span>
                        <form action="{{route('soustacheCreate')}}" method="get">
                            @csrf
                            <input type="hidden" name="tache_id" value="{{$tache->id}}">
                            <input type="hidden" name="projet_id" value="{{$projet->id}}">
                            <input type="submit" value="Ajouter">
                        </form>
                        @if(count($soustaches) <= 0)

                        <form action="{{route('soustacheCreate')}}" method="get">
                            @csrf
                            @foreach ($soustaches as $soustache)
                            @php $checked = $soustache->status = 0 ? '': 'checked' @endphp
                            <input type="checkbox" name="valideSoustache" $checked>
                            @endforeach
                            <input type="submit" value="Ajouter">
                        </form>
                        
                        @endif
                        {{-- si ilm y a des sous tache --}}
                        {{-- foreach soustaches as soustache --}}
                        {{-- une  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
