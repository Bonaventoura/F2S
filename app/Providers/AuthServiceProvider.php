<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ( $user) {
            return $user->isAdmin();
        });

        Gate::define('client_f2s', function ( $user) {
            return $user->client_startup();
        });

        Gate::define('client_foire', function ( $user) {
            return $user->client_foire(['client_foire','client_f2s']);
        });
    }
}
