<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousTache extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'status',
        'tache_id'
    ];

    public function tache(){
        return $this->belongsTo('App/Models/Tache'); 
    }
}
