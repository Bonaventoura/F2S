<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EspaceClient\ClientController;
use App\Models\Client\Boutique;
use Illuminate\Http\Request;
use App\Account;
use App\Models\Client\Product;

class FoireController extends FrontendController
{
    public function index()
    {
        $boutiques = Boutique::orderBy('id','desc')->paginate(9);
        //dd($boutiques);
        //$data = $this->user_data();
        return view('frontend.foire.index')->with([
            'boutiques'=>$boutiques,
        ]);
    }

    public function show($boutique)
    {

        $market = Boutique::where('nom_boutique','=',$boutique)->first();

        $account = $this->market_account($market->id);

        $boutiques = Boutique::orderBy('id','desc')->limit(12)->get();

        if ($account) {
            $prods = Boutique::find($market->id)->products()->paginate(12);
            //dd($prods);
            return view('frontend.foire.show')->with([
                'market'=>$market,
                'products'=>$prods,
                'account'=>$account,
                'boutiques'=>$boutiques,
            ]);
        } else {
            session()->flash('alert',"La boutique choisie n'existe pas encore ou est incorrecte");
            return redirect()->route('foire.online');
        }


    }

    public function market_account($market_id)
    {
        $account = Account::find($market_id)->get();

        foreach ($account as $key => $value) {
            return $value;
        }
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
