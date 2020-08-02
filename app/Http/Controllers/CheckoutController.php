<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{
    public function index()
    {
        \Stripe\Stripe::setApiKey("sk_test_R476t81gNNlcVrcIyDTEfZCn00DMVepirC");

        $intent = PaymentIntent::create([
            'amount'=>\Cart::getTotal(),
            'currency'=> 'eur'
        ]);

        $clientSecret = Arr::get($intent,'client_secret');

        $items =  \Cart::getContent();
        return view('e-commerce.checkout')->with([
            'items'=>$items,
            'clientSecret'=>$clientSecret,
        ]);
    }
}
