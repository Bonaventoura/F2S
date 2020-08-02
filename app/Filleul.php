<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filleul extends Model
{
    protected $fillables = [
        'code_parrain',
        'code_filleul',
        'pseudo_parrain',
    ];


}
