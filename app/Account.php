<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filleul;
use App\Models\Club;

class Account extends Model
{
    protected $fillable = [
        'nom',
        'prenoms',
        'sexe',
        'pays',
        'ville',
        'date_n',
        'num_tel',
        'pseudo_parrain',
        'email',
        'pseudo',
        'password',
        'photo_profil'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }


}
