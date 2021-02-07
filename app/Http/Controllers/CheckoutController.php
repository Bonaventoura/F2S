<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $items = \Cart::getContent();

        $user = Auth::user();

        if ($items->count() > 0) {
            return view('frontend.foire.checkout')->with([
                'items'=>$items,
                'user'=>$user,
            ]);
        } else {
            return redirect()->route('foire.online');
        }
    }
}
