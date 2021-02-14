<?php

namespace App\Models\Foire;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'prix_total_cmd',
        'total_quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
