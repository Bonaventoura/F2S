<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use App\Models\Role;
use Darryldecode\Cart\Cart;
use App\Models\Foire\Client;
use Illuminate\Http\Request;
use App\Models\Client\Product;
use App\Models\Client\Boutique;
use App\Models\Client\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\EspaceClient\ClientController;

class FoireController extends FrontendController
{
    public function index()
    {
        $boutiques = Boutique::orderBy('id','desc')->paginate(9);
        $categories = Category::all();
        return view('frontend.foire.index')->with([
            'boutiques'=>$boutiques,
            'categories'=>$categories
        ]);
    }

    public function show($boutique)
    {

        $market = $this->boutique($boutique);

        $account = $this->market_account($market->id);
        //dd($account);

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

    public function boutique($boutique)
    {
        $req = Boutique::where('nom_boutique','=',$boutique)->get();

        foreach ($req as $key => $value) {
            return $value;
        }
    }

    public function market_account($market_id)
    {
        $account = Account::where('id','=',$market_id)->get();

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

    public function search(Request $request)
    {
        $search =  $request->search;
        $data = [];
        $boutiques = Boutique::where('nom_boutique','like','%'.$search.'%')->paginate(12);

        $products = Product::where('nom_produit','like','%'.$search.'%')->get();

        if ($boutiques->count() > 0) {
            $data = [
                'boutiques'=>$boutiques,
                'result'=>$boutiques->count(),
            ];
            $count = $boutiques->count();
            //dd($data);
            session()->flash('success',"$count Résultats");
            return view('frontend.foire.index')->with([
                'boutiques'=>$boutiques,
                'data'=>$data,
            ]);
        }elseif ($products->count() > 0) {
            $data = [
                'products'=>$products,
                'result'=>$products->count(),
            ];
            $count = $products->count();
            session()->flash('success',"$count Résultats");
            return view('frontend.foire.search-product')->with([
                'products'=>$products,
                'data'=>$data,
            ]);
        }else {
            session()->flash('alert',"Aucun produit ou boutique ne correspond à votre recherche, veuillez réessayez svp");
            return redirect()->back();
        }

    }

    public function checkout()
    {
        $items = \Cart::getContent();

        if ($items->count() > 0) {
            return view('frontend.foire.checkout')->with([
                'items'=>$items
            ]);
        } else {
            return redirect()->route('foire.online');
        }

    }


    public function register(Request $request)
    {
        $this->validate($request,[
            'nom'=>'required',
            'prenoms'=>'required',
            'pseudo'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $data = [
            'nom'=>$request->nom,
            'prenoms'=>$request->prenoms,
            'pseudo'=>$request->pseudo,
            'email'=>$request->email,
            'password'=>$request->password
        ];

        Client::create($data);

        $user = new User();

        $user->name = $data['nom'];
        $user->username = $data['pseudo'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        $user->save();

        $role = Role::select('id')->where('name','client_foire')->first();
        $user->roles()->attach($role);

        session()->flash('success',"Félicitations, votre compte foire a été crée avec succès, connectez vous pour la poursuite de vos opérations");
        return redirect()->back();

    }


    /**
     * @return category_id
     */
    public function getCategory($name)
    {
        $req = Category::where('name',$name)->get();

        foreach ($req as $key => $value) {
            return $value->id;
        }
    }

    /**
     * @return products
     */
    public function category($name)
    {
        $cat_id = $this->getCategory($name);

        $products = Product::where('category_id',$cat_id)->get();

        return view('frontend.foire.search-product')->with([
            'products'=>$products,
            'data'=>$name,
        ]);

    }



}
