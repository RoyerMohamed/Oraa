<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];  

    public function users(){
        return $this->belongsToMany(User::class , 'user_projets');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
    
}
