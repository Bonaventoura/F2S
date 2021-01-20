<?php

namespace App\Models\Client;

use App\Account;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'account_id',
        'nom_projet',
        'sm',
        'description',
        'cout_projet',
        'apport_personnel',
        'nature_projet',
        'domaine',
        'actualite',
        'type_remboursement',
        'taille_entreprise',
        'plan_affaire',
        'financer',
        'duree_projet'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class,'account_id');
    }
}
