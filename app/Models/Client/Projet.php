<?php

namespace App\Models\Client;

use App\Account;
use App\Models\Domaine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'domaine_id',
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

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    public function carneva()
    {
        return $this->belongsTo(Carneva::class);
    }
}
