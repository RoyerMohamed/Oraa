<div class="">
    <div class='project'>
        <div class='project-info'>
            <h1>{{ $projet->nom }}</h1>
        </div>
        <div class='project-tasks'>
            @if (count($boards) <= 0)
                <div class='project-column'>
                    <div class='project-column-heading'>
                        <h2 class='project-column-heading__title'>Vous pouvez ajouter un board</h2><button
                            class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
                    </div>
                    <div>
                        <form action="{{ route('boardStore') }}" method="get" class=" neumorphisme ">
                            @csrf
                            <input type="hidden" name="projet_id" value="{{ $projet->id }}">
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
            @else
                @foreach ($boards as $board)
                    <div class="d-flex flex-column">
    
                        <div class='project-column' wire:sortable="updateTaskOrder">
                            <div class='project-column-heading'>
                                <h2 class='project-column-heading__title'>{{ $board->nom }}</h2>
                                <div class="dropdown">
                                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form action="{{ route('boardStore') }}" method="get" class=" neumorphisme ">
                                                @csrf
                                                <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                                <div class="d-flex justify-content-between pb-3">
                                                    <label for="nom"> Nom du board : </label>
                                                    <input type="text" name="nom" class="input_neumorphisme">
                                                </div>
                                                <div>
                                                    <input type="submit" class="btn_valider">
                                                </div>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="">
                                                @csrf
                                                <input type="hidden" name="{{ $board->id }}">
                                                <input type="submit" value="Modifier un board">
                                            </form>
                                        </li>
                                        <li>
                                            <form action="">
                                                @csrf
                                                <input type="hidden" name="{{ $board->id }}">
                                                <input type="submit" value="Supprimer un board">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <button class='project-column-heading__options'></button>
                            </div>
                            
                                @foreach ($board->taches as $tache)
                                    <div class='task' id="task" wire:sortable.item="{{ $tache->id }}" wire:key="{{ $tache->id }}" >
                                        <div class='task__tags'><span
                                                class='task__tag task__tag--copyright'>{{ $tache->nom }}</span><button
                                                class='task__options'>
                                                <i class="fas fa-ellipsis-h"></i>
        
                                            </button></div>
                                        <div class="task__desc">
                                            <p>{{ strip_tags($tache->description) }}</p>
                                        </div>
                                        <div class='task__stats'>
                                            <span><time datetime="2021-11-24T20:00:00"><i
                                                        class="fas fa-flag"></i>{{ $tache->echeance }}</time></span>
                                            <span><i class="fas fa-comment"></i>3</span>
                                            <span class='task__owner'></span>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                        <div>
                            <form action="{{ route('tacheCreate') }}" method="GET">
                                @csrf
                                <input type="hidden" name='board_id' value="{{ $board->id }}">
                                <input type="hidden" name='projet_id' value="{{ $projet->id }}">
    
                                <input type="submit" value="Crée une cart">
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
       
    </div>
  
</div>
