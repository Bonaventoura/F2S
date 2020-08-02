<?php

namespace App\Models\Client;

use App\Account;
use App\Models\Client\Product;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    protected $fillable = [
        'accounts_id',
        'nom_boutique',
        'domaine_activite',
        'pays',
        'ville',
        'quartier',
        'contact_boutique',
        'email_boutique',
        'mode_reglement',
        'avatar'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class,'accounts_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    
}
