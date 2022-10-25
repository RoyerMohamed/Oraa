<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function taches(){
        return $this->hasMany(Tache::class);
    }

    public function projet(){
        return $this->belongsTo(Projet::class);
    }
}
