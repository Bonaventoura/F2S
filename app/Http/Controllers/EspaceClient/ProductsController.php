<?php

namespace App\Http\Controllers\EspaceClient;

use Illuminate\Http\Request;
use App\Models\Client\Product;
use App\Models\Client\Boutique;
use App\Http\Controllers\Controller;
use App\Models\Client\Category;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductsController extends ClientController
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->username;

        $account_id = $this->getId($user);

        $boutique_id = $this->marketID($account_id);
        $categories = Category::all();
        return view('espace_client.products.create')->with([
            'user'=>$user,
            'boutique_id'=>$boutique_id,
            'categories'=>$categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nom_produit'=>'required',
            'prix_unit_gros'=>'required|integer',
            'prix_unit_vente'=>'required|integer',
            'photo_produit'=>'required|image',
        ]);

        if ($request->hasFile('photo_produit')) {

            $filename = $request->photo_produit->getClientOriginalName();

            $img = Image::make(request()->file('photo_produit'))->fit(300,200)->save(public_path('/storage/produits/'.$filename),80,'jpg');


            $nom = $request->nom_produit;

            //dd($request->all());

            $product = Product::create([
                'nom_produit'=>$request->nom_produit,
                'prix_unit_gros'=>$request->prix_unit_gros,
                'prix_unit_vente'=>$request->prix_unit_vente,
                'photo_produit'=>$filename,
                'category_id'=>$request->category_id,
                'qtte_stock'=>$request->qtte_stock,
            ]);
            $product->boutiques()->attach($request->boutique_id);

            session()->flash('success',"Le produit $nom a été chargé avec succès");
            return redirect()->back();

        }else {
            session()->flash('alert',"Veuillez chargé la photo du produit");
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product )
    {
        //dd($product);
        $user = Auth::user()->username;

        $accounts_id = $this->getId($user);

        $boutique_id = $this->marketID($accounts_id);

        $categories = Category::all();

        return view('espace_client.products.edit')->with([
            'user'=>$user,
            'boutique_id'=>$boutique_id,
            'product'=>$product,
            'categories'=>$categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('photo_produit')) {

            $filename = $request->photo_produit->getClientOriginalName();
            $img = Image::make(request()->file('photo_produit'))->fit(300,200)->save(public_path('/storage/produits/'.$filename),80,'jpg');

            $product->photo_produit = $filename;
        }

        $product->nom_produit = $request->nom_produit;
        $product->category_id = $request->category_id;
        $product->qtte_stock = $request->qtte_stock;
        $product->prix_unit_gros = $request->prix_unit_gros;
        $product->prix_unit_vente = $request->prix_unit_vente;

        $product->update();
        $product->boutiques()->sync($request->boutique_id);

        session()->flash('success',"Le produit a été modifié avec succès");
        return redirect()->route('boutiques.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
