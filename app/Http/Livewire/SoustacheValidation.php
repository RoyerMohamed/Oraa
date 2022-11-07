<?php

namespace App\Http\Livewire;

use App\Models\SousTache;
use Livewire\Component;

class SoustacheValidation extends Component
{

    public $soustaches; 
    public $is_checked = true ; 

    public function mount($soustaches)
    {
        $this->soustaches = $soustaches; 
    }

    public function set_value(){
        if($this->is_checked === false){
            dd($this->is_checked); 
        }
    }

    public function render()
    {
        return view('livewire.soustache-validation');
    }
}
