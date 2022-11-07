{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('projet') }}"><i class="nav-icon la la-question"></i> Projets</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('tache') }}"><i class="nav-icon la la-question"></i> Taches</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('board') }}"><i class="nav-icon la la-question"></i> Boards</a></li>