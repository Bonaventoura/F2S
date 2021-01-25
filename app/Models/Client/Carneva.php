<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Carneva extends Model
{
    protected $fillable = [
        'projet_id',
        'fichier'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
