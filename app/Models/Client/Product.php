<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Boutique;

class Product extends Model
{
    protected $guarded = [];

    public function boutiques()
    {
        return $this->belongsToMany(Boutique::class)->withTimestamps();
    }

    public function submit()
    {
        return $this->belongsTo(SubmitProduct::class);
    }


}
