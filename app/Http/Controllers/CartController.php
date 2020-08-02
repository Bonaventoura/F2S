<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart()
    {
        $items =  \Cart::getContent();

        return view('e-commerce.cart')->with([
            'items'=>$items,
        ]);
    }

    public function add(Request $request)
    {
        $name = $request->name;
        $data = [
            'id'=>$request->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,

            'attributes'=>[
                'image'=>$request->img,
            ]
        ];

        //dd($data);

        $add = \Cart::add($data);

        if ($add) {
            session()->flash('success',"le produit $name a été ajouté à votre panier avec succès");
            return redirect()->back();
        }
    }


    /**
     * la methode update permet de faire la modification de la quantité d'une article
     */
    public function update(Request $request)
    {
        \Cart::update($request->id,
                array(
                    'quantity'=>array(
                        'relative'=>false,
                        'value'=>$request->quantity
                    ),
                ));
        
        session()->flash('success',"la quantité du produit a été mise à jour avec réussite");
        return redirect()->back();
    }

    /**
     * la méthode remove supprime un produit du panier
     */
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success',"le produit a été supprimé de votre panier avec succès");
        return redirect()->back();
    }

    /**
     * la méthode clear supprime tous les produits d'un panier
     */
    public function clear()
    {
        \Cart::clear();
        session()->flash('success',"Tous les produits ont été supprimés de votre panier");
        return redirect()->back();
    }
}
