<div class="">
    <div class='project'>
        <div class='project-info'>
            <h1>{{ $projet->nom }}</h1>
            @if (count($boards) >= 0)
                <form action="{{ route('boardCreate') }}" method="get">
                    @csrf
                    <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                    <div>
                        <input type="submit" value="Cree un board">
                    </div>
                </form>
            @endif
        </div>
        <div class='project-tasks'>
            @if (count($boards) <= 0)
                <div class='project-column'>
                    <div class='project-column-heading'>
                        <h2 class='project-column-heading__title'>Vous pouvez ajouter un board</h2>
                    </div>
                </div>
            @else
                <div class="d-flex" wire:sortable="updateGroupOrder" wire:sortable-group="updateTaskOrder">
                    @foreach ($boards as $board)
                        <div class="d-flex flex-column">
                            <div class='project-column' wire:key="{{ $board->id }}"
                                wire:sortable.item="{{ $board->id }}">
                                <div class='project-column-heading'>
                                    <h2 class='project-column-heading__title' wire:sortable.handle>{{ $board->nom }}
                                    </h2>
                                    <div class="dropdown">
                                        <a href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('boardEdit') }}" method="get">
                                                    @csrf
                                                    <input type="hidden" name="board_id" value="{{ $board->id }}">
                                                    <input type="submit" value="Modifier un board">
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('boardDelete') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="board_id" value="{{ $board->id }}">
                                                    <input type="submit" value="Supprimer un board">
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <button class='project-column-heading__options'></button>
                                </div>
                                <ul wire:sortable-group.item-group="{{ $board->id }}">
                                    @foreach ($board->taches as $tache)
                                        <div class='task' id="task" wire:key="{{ $tache->id }}"
                                            wire:sortable-group.item="{{ $tache->id }}">
                                            <div class='task__tags'><span class='task__tag task__tag--copyright'
                                                    wire:sortable-group.handle>{{ $tache->status }}</span>
                                                <div class="dropdown">
                                                    <a href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('tacheEdit') }}" method="get">
                                                                @csrf
                                                                <input type="hidden" name="tache_id"
                                                                    value="{{ $tache->id }}">
                                                                <input type="hidden" name="projet_id"
                                                                    value="{{ $projet->id }}">
                                                                <input type="submit" value="Modifier la tache">
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('tacheDelete') }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="tache_id"
                                                                    value="{{ $tache->id }}">
                                                                <input type="submit" value="Supprimer la tache">
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('tacheIndex') }}" method="get">
                                                                @csrf
                                                                <input type="hidden" name="tache_id"
                                                                    value="{{ $tache->id }}">
                                                                <input type="hidden" name="projet_id"
                                                                    value="{{ $projet->id }}">
                                                                <input type="submit" value="voir la tache">
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="task__desc">
                                                <p>{{ strip_tags($tache->description) }}</p>
                                            </div>
                                            <div class='task__stats'>
                                                @php
                                                    $bg_color = ""; 
                                                    switch ($tache->priorite) {
                                                        case "Urgent":
                                                        $bg_color = '#DC3444';
                                                            break;
                                                        case "Important":
                                                        $bg_color = '#FFC106';
                                                            break;
                                                        case "Normal":
                                                        $bg_color = '#13A3B8';
                                                            break;
                                                        default : 
                                                        $bg_color = ""; 
                                                    }
                                                    
                                                @endphp
                                                <span><time datetime="2021-11-24T20:00:00"><i
                                                            class="fas fa-flag"></i>{{ $tache->echeance }}</time></span>
                                                <span><i class="fas fa-comment"></i>3</span>
                                                <span class='task__owner' style="background : {{$bg_color}}"></span>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
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
                </div>
            @endif
        </div>

    </div>

</div>
