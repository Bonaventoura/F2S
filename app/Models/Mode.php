<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    /**
     * le model mode represente le mode de payement 
     */
    protected $fillable = ['nom_mode'];
}
