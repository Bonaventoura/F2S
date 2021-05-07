<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * 
     */
    public function redirectTo()
    {
        $user = Auth::user();
        if (Auth::user()->roles->pluck('name')->contains('admin')) {
            return '/espace-admin';
        }elseif (Auth::user()->roles->pluck('name')->contains('client_f2s')) {
            //dd($user->roles->pluck('name'));
            return '/espace-client';
        }elseif (Auth::user()->roles->pluck('name')->contains('client_foire')) {
            return '/';
        }else {
            return '/';
        }
    }
}
