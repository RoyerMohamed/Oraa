<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pseudo',
        'email',
        'password',
        'metier', 
        'apropos',
        'image_name', 
        'image_size',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = ['projets'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App/Models/Role'); 
    }
    
    public function projets(){
        return $this->belongsToMany(Projet::class , 'user_projets')->withPivot('creator');
    }

    public function taches(){
        return $this->belongsToMany(Tache::class, 'user_taches');
    }

    public function messages(){
        return $this->hasMany('App/Models/Message');
    }

    public function commentaires(){
        return $this->hasMany('App/models/Commentaire'); 
    }
}
