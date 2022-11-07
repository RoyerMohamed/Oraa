<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'board_id',
        'priorite', 
        'status',
        'ordre', 
        'echeance'
    ];

    public function messages(){
        return $this->hasMany('App/Models/Message');
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
    public function board(){
        return $this->belongsTo(Board::class);
    }
}
