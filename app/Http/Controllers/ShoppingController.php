<?php

namespace App\Http\Controllers;

use App\Models\Client\SubmitProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingController extends Controller
{
    public function index()
    {
        $products = $this->getSubmitProducts()->paginate(4);
        //dd($products);
        return view('e-commerce.index')->with([
            'products'=>$products,
        ]);
    }

    public function getSubmitProducts()
    {
        return $products = DB::table('submit_products')
            ->join('boutiques', 'submit_products.boutique_id', '=', 'boutiques.id')
            ->join('products', 'submit_products.product_id', '=', 'products.id')
            ->select('products.*', 'boutiques.nom_boutique')
            ->where('submit_products.valider','=',0)
            ->get();
    }
}
