<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contenu',
        'image',
        'user_id',
        'projet_id', 
        'message_id',
    ];

    public function projet(){
        return $this->belongsTo('App/Models/Projet');
    }

    public function user(){
        return $this->belongsTo('App/Models/User');
    }
    public function commentaires(){
        return $this->hasMany('App/Models/Commentaire');
    }

    public function tache(){
        return $this->belongsTo('App/Models/Tache');
    }

}
