<?php

namespace App;

use App\Models\Solde;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = ['niv','valeur'];

    public function soldes()
    {
        return $this->hasMany(Solde::class);

    }
}
