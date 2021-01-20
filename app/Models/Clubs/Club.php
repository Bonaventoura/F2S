<?php

namespace App\Models\Clubs;

use App\Account;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = ['groupe_id','account_id'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
