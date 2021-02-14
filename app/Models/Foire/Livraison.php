<?php

namespace App\Models\Foire;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $fillable = [
        'order_id',
        'token',
        'user_id',
        'pays',
        'ville',
        'quartier',
        'description'
    ];
}
