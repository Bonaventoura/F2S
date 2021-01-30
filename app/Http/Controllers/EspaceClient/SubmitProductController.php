<?php

namespace App\Http\Controllers\EspaceClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\SubmitProduct;
use Illuminate\Support\Facades\Auth;

class SubmitProductController extends ClientController
{
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

        $accounts_id = $this->getId($user);

        $boutique_id = $this->marketID($accounts_id);

        $products = $this->getProducts($accounts_id);

        return view('espace-client.submit-product.create')->with([
            'boutique_id'=>$boutique_id,
            'products'=>$products,
            'user'=>$user,
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
            'boutique_id'=>'required',
            'product_id'=>'required',
            'quantite_stock'=>'required|int',
        ]);

        $data = [
            'boutique_id'=>$request->boutique_id,
            'product_id'=>$request->product_id,
            'quantite_stock'=>$request->quantite_stock,
            'description'=>$request->description
        ];

        //dd($data);
        $boutique_id = $request->boutique_id;
        $product_id = $request->product_id;

        $soumis = $this->soumis($product_id,$boutique_id);

        if ($soumis  > 0) {

            session()->flash('alert',"vous avez déjà soumis cet produit");
            return redirect()->back();

        } else {

            $submitProduct = SubmitProduct::create($data);

            session()->flash('success',"votre produit a été soumis avec succès, entente de validation");
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
