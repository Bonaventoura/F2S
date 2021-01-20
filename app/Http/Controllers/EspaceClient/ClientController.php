<?php

namespace App\Http\Controllers\EspaceClient;

use App\Account;
use App\Models\Clubs\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        return view('espace_client.index')->with([
            'user'=>$user,
            'lien'=>$lien
        ]);
    }

    /**
     * @return client
     * la methode client_account retourne les informations d'un client
     */
    public function client_account($account)
    {
        $results = Account::select('*')->where('pseudo','=',$account)->get();

        foreach ($results as $key => $value) {
            return $value;
        }

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
     * la méthode market retourne toutes les infos concernant la boutique d'un_client
     */
    public function market($account)
    {
        return $results = DB::table('boutiques')->select('*')
                    ->where('accounts_id','=',$account)
                    ->get();
    }

    /**
     * la methode marketID retourne l'id d'une boutique pour un_client
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
     * la méthode getProducts permet de retourner tous les produits d'une boutique appartenant à un_client
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
     * la methode getClub retourne l'id du club dont le_client appartient
     */
    public function getClub($id)
    {
        $result = Club::all()->where('account_id','=',$id);

        foreach ($result as $key => $value) {
            return $value->id;
        }

    }

    /**
     * la methode club retourne les membres du club du_client
     */
    public function club(string $nom)
    {
        $user = $this->user();
        //dd($user);
        $id = $this->getId($user);
        //dd($id);
        $club_id = $this->getClub($id);
        dd($club_id);
        $club = Club::find($club_id);
        //$nomClub = $club->groupe->nom;
        dd($club);

        //$membres = DB::table('clubs')->select('*')->where('groupe_id','=',$club_id)->get();
        $membres = Club::all()->where('groupe_id','=',$club_id)->paginate(25);
        //dd($membres);
        return view('espace_client.mon-club.index')->with([
            'user'=>$user,
            'membres'=>$membres,
            'club'=>$club
        ]);
    }
}
