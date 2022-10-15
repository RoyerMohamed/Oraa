<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousTache extends Model
{
    use HasFactory;

    public function tache(){
        return $this->belongsTo('App/Models/Tache'); 
    }
}