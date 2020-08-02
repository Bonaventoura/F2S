<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends FrontendController
{
    public function index()
    {
        // si le visiteur se connecte
        if (Auth::user()) {

            $user = Auth::user();

            $username = $this->account_exist($user->username);
            //dd($username);
            /**
             * si l'utilisateur connecté a un compte client, alors on affiche ces infos sinon retouner 0
             */
            if ($username ==1) {
                $account = $this->my_account($user->username);
                $id = $this->getID($user->username);
                //dd($id);
                $market = $this->marketID($id);
                //dd($market);
                $satut = $this->status($account);
                $profil = $this->profile($account);
                return view('frontend.index')->with([
                    'account'=>$account,
                    'statut'=>$satut,
                    'profil'=>$profil,
                    'market'=>$market,
                    'exist'=>$username
                ]);
            } else {

                $name = $user->username;
                return view('frontend.index')->with([
                    'account'=>$name,
                    'exist'=>$username
                ]);
            }

        } else {
            return view('frontend.index');
        }

    }

    public function profile($account)
    {
        $results = DB::table('accounts')->select('photo_profil')
                    ->where('pseudo','=',$account)
                    ->get();

        foreach ($results as $key => $value) {
            return $value->photo_profil;
        }
    }

    public function status($account)
    {
        $result = Account::where('pseudo','=',$account)->where('actif','=',1)->first();

        if ($result) {
            return $msg=1;
        } else {
            return $msg =0;
        }
    }

    /**
     * la méthode account_exist permet de vérifier l'existence d'un compte client
     */
    public function account_exist(string $username)
    {
        $result = Account::where('pseudo','=',$username)->first();

        if ($result) {
            return $msg=1;
        } else {
            return $msg =0;
        }
    }

    public function getID($username)
    {
        $accounts = DB::table('accounts')->select('id')->where('pseudo','=',$username)->get();

        foreach ($accounts as $key => $account) {
            return $account->id;
        }
    }


}
