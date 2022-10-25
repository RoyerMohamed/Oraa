@extends('layouts.app')

@section('content')
<div class='project'>
    <div class='project-info'>
      <h1>Homepage Design</h1>
    </div>
        <div class='project-tasks'>
            @foreach ($boards as $board)
                <div class='project-column'>
                    <div class='project-column-heading'>
                        <h2 class='project-column-heading__title'>{{$board->nom}}</h2><button
                            class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
                    </div>
                    @foreach ($board->taches as $tache)
                    {{-- {{dump($tache)}} --}}
                    <div class='task neumorphisme' draggable='true'>
                        <div class='task__tags'><span class='task__tag task__tag--copyright'>{{$tache->nom}}</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
                        <div class="task__desc">
                            <p>{{$tache->description}}</p>
                        </div>
                        <div class='task__stats'>
                            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
                            <span><i class="fas fa-comment"></i>3</span>
                            <span class='task__owner'></span>
                        </div>
                    </div>
                    @endforeach
                    
                </div>

                @endforeach
            </div>


            {{-- @foreach ($boards as $board)
        <div class="col-md-3 kanban-board">
          <h1>{{$board->nom}}</h1>  
                @foreach ($board->taches as $tache)
                <div class="col-md-10">
                    {{$tache->nom}}
                </div>
                @endforeach
            
            </div>
            @endforeach --}}
</div>
@endsection
