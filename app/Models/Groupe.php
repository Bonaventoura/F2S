<?php

namespace App\Models;

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
