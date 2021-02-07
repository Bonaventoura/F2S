<?php

namespace App\Models\Foire;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom',
        'prenoms',
        'pseudo',
        'email',
        'password'
    ];

    
}
