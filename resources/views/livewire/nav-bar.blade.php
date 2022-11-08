<div class="nav_content_open nav_content_close neumorphisme " id="my_nav">
    <div class="nav_content_open-logo">
        <img src="{{ asset('images/Logo_oraa.png') }}" alt="" srcset="">
    </div>
    <ul>
        <li> <a href="{{ route('profil') }}"><i class="fas fa-user-circle"></i> <span>Profil</span></a></li>
        <li> <a href="{{ route('projet') }}"><i class="far fa-folder"></i> <span>Liste de projet</span></a>
            @if (count($projets) > 0)
                <button class="nav_content_open-toggle_list " type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="collapse" id="collapseExample">
                    @foreach ($projets as $projet)
                        <form action="{{ route('kanbanIndex') }}" method="get">
                            @csrf
                            <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                            <button type="submit" class="nav_content_open-link">
                                <span>{{ $projet->nom }}</span>
                            </button>
                        </form>
                    @endforeach
                </div>
            @endif
        </li>
        <li><a href=""><i class="fas fa-chart-bar"></i> <span>dernier tablau</span></a></li>
        <li> <a href="{{ route('profil_edit') }}"><i class="fas fa-cog"></i> <span>Parametre</span> </a></li>
        <li> <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> <span>{{ __('Deconnection') }}</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>

</div>
