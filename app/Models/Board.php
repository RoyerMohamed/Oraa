<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['nom','projet_id', 'ordre'];


    public function taches(){
        return $this->hasMany(Tache::class)->orderBy("ordre");
    }

    public function projet(){
        return $this->belongsTo(Projet::class);
    }
}
