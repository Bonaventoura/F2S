<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    protected $fillable = [
        'projet_id',
        'nom_parrain',
        'prenoms_parrain',
        'fonction',
        'email_address',
        'telephone',
        'calendrier'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
