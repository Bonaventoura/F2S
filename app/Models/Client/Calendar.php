<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'projet_id',
        'fichier'
    ];
}
