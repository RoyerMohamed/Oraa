<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth; 

class NavBar extends Component
{

    public function render()
    {
        $projets = Auth::user()->projets;
        return view('livewire.nav-bar', [
            "projets" => $projets
        ]);
    }
}
