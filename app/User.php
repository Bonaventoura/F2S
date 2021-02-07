<?php

namespace App;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * @return user_role=admin
     */
    public function isAdmin()
    {
        return $this->roles()->where('name','=','admin')->first();
    }

    /**
     * @return user_role == client_f2s
     */
    public function client_startup()
    {
        return $this->roles()->where('name','client_f2s')->first();
    }

    /**
     * @return user_role == client_foire
     */
    public function client_foire(array $roles)
    {
        return $this->roles()->whereIn('name',$roles)->first();
    }
}
