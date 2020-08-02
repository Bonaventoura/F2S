<?php

namespace App\Models;

use App\Account;
use App\Niveau;
use Illuminate\Database\Eloquent\Model;

class Solde extends Model
{
    protected $fillabe = ['account_id','niveau_id','montant_actuel'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

}
