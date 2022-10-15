<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App/models/user');
    }
    public function message(){
        return $this->belongsTo('App/models/Message');
    }

}
