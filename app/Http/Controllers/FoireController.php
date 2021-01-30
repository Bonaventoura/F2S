<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EspaceClient\ClientController;
use App\Models\Client\Boutique;
use Illuminate\Http\Request;
use App\Account;

class FoireController extends FrontendController
{
    public function index()
    {
        $boutiques = Boutique::all()->paginate(9);
        //dd($boutiques);
        //$data = $this->user_data();
        return view('frontend.foire.index')->with([
            'boutiques'=>$boutiques,
        ]);
    }

    public function show(Boutique $boutique)
    {
        //dd($boutique);
        $accounts_id = $boutique->accounts_id;
        //dd($accounts_id);
        $products = $this->getProducts($accounts_id)->paginate(12);
        return view('frontend.foire.show')->with([
            'boutique'=>$boutique,
            'products'=>$products,
        ]);
    }

    public function account_exist(string $username)
    {
        $result = Account::where('pseudo','=',$username)->first();

        if ($result) {
            return $msg=1;
        } else {
            return $msg =0;
        }
    }
}
