<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class SubmitProduct extends Model
{
    protected $fillable = [
        'boutique_id',
        'product_id',
        'quantite_stock',
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'product_id');
    }

    public function boutiques()
    {
        return $this->hasMany(Boutique::class,'boutique_id');
    }



}
