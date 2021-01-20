<?php

namespace App\Models\Clubs;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nom_project',
        'montant_project',
        'club_id',
        'cahier_charge',
        'budget',
        'description',
        'duree_project'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    /**
     * la methode getNom retourne le nom d'un club
     */

    /*
    public function getNom($id)
    {
        $result =
    } */
}
