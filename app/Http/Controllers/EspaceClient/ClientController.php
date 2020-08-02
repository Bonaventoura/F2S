<?php

namespace App\Http\Controllers\EspaceClient;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function user()
    {
        $user = Auth::user();

        $account = $this->my_account($user->username);

        return $account;
    }

    public function index()
    {
        $user = $this->user();
        $lien ="http://localhost:8000/compte/create/". $this->get_lien($user);
        return view('espace-client.index')->with([
            'user'=>$user,
            'lien'=>$lien
        ]);
    }

    public function client_account($account)
    {
        return  $account = DB::table('accounts')->select('*')
                    ->where('pseudo','=',$account)
                    ->get();
    }

    public function getId($account)
    {
        $results = DB::table('accounts')->select('id')
            ->where('pseudo','=',$account)
            ->get();

        foreach ($results as $key => $value) {
            return $value->id;
        }
    }

    /**
     * la méthode market retourne toutes les infos concernant la boutique d'un client
     */
    public function market($account)
    {
        return $results = DB::table('boutiques')->select('*')
                    ->where('accounts_id','=',$account)
                    ->get();
    }

    /**
     * la methode marketID retourne l'id d'une boutique pour un client
     */
    public function marketID($account)
    {
        $results = DB::table('boutiques')->select('id')
                    ->where('accounts_id','=',$account)
                    ->get();

        foreach ($results as $key => $value) {
            return $value->id;
        }
    }


    /**
     * la méthode getProducts permet de retourner tous les produits d'une boutique appartenant à un client
     */
    public function getProducts($account)
    {
        return $products = DB::table('boutique_product')
            ->join('boutiques', 'boutique_product.boutique_id', '=', 'boutiques.id')
            ->join('products', 'boutique_product.product_id', '=', 'products.id')
            ->select('products.*', 'boutiques.nom_boutique')
            ->where('boutiques.accounts_id','=',$account)
            ->get();
    }

    /**
     * la méthode soumis permet de verifier si un produit a été déjà soumis par une boutique
     */
    public function soumis($product_id,$boutique_id)
    {
        $soumis = DB::table('submit_products')
                    ->select('*')
                    ->where('boutique_id','=',$boutique_id)
                    ->where('product_id','=',$product_id)
                    ->get();

        return $soumis->count();
    }

    /**
     * la methode club retourne les membres du club du client
     */
    public function club(string $nom)
    {
        $user = $this->user();
        $id = $this->getId($user);
        $club = Club::all()->where('account_id','=',$id);
        dd($club);
        return view('espace-client.mon-club.index')->with(['user'=>$user]);
    }
}
