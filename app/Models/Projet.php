<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];  
    protected $with = ['boards'];  

    public function users(){
        return $this->belongsToMany(User::class , 'user_projets')->withPivot('creator');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
    
    public function boards(){
        return $this->hasMany(Board::class);
    }
    
}
