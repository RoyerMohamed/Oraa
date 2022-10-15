<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    public function messages(){
        return $this->hasMany('App/Models/Message');
    }
    public function projet(){
        return $this->belongsTo('App/Models/Projet');
    }
    public function images(){
        return $this->hasMany('App/Models/Image');
    }
    public function sousTaches(){
        return $this->hasMany('App/Models/SousTache');
    }
    public function users(){
        return $this->belongsToMany(User::class, 'user_taches');
    }
}
