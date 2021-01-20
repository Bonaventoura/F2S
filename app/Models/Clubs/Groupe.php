<?php

namespace App\Models\Clubs;

use App\Account;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = ['nom','ville'];

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

    public function account()
    {
        return $this->hasMany(Account::class);
    }
}
