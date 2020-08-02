<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $fillable = [
        'mode_id',
        'codeRef',
        'numero_envoi',
        'montant'
    ];

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }
}
