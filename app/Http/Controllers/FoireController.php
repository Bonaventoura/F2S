<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EspaceClient\ClientController;
use App\Models\Client\Boutique;
use Illuminate\Http\Request;

class FoireController extends FrontendController
{
    public function index()
    {
        $boutiques = Boutique::all()->paginate(9);
        //dd($boutiques);
        return view('foire-online.index')->with([
            'boutiques'=>$boutiques,
        ]);
    }

    public function show(Boutique $boutique)
    {
        //dd($boutique);
        $accounts_id = $boutique->accounts_id;
        //dd($accounts_id);
        $products = $this->getProducts($accounts_id)->paginate(12);
        return view('foire-online.show')->with([
            'boutique'=>$boutique,
            'products'=>$products,
        ]);
    }
}
