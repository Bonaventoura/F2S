<?php

namespace App\Http\Controllers;

use App\Models\Foire\Livraison;
use App\Models\Foire\Order;
use App\Models\Foire\OrderProduct;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $items = \Cart::getContent();

        $user = Auth::user();

        if ($items->count() > 0) {
            return view('frontend.foire.checkout')->with([
                'items'=>$items,
                'user'=>$user,
            ]);
        } else {
            return redirect()->route('foire.online');
        }
    }

    public function passer_commande(Request $request)
    {
        $items = \Cart::getContent();

        $user_id = Auth::user()->id;
        $token = date('dmYHis');
        $prix_total = \Cart::getTotal();
        $quantity_total = $items->count();

        $data = [
            'user_id'=>$user_id,
            'token'=>$token,
            'prix_total_cmd'=>$prix_total,
            'total_quantity'=>$quantity_total
        ];

        Order::create($data);
        $order_id = $this->getlastOrderID();

        foreach ($items as $key => $product) {

            $order_product = new OrderProduct();

            $order_product->order_id = $order_id;
            $order_product->product_id = $product->id;
            $order_product->quantity = $product->quantity;

            $order_product->save();
        }

        $livraison = new Livraison();

        $livraison->order_id = $order_id;
        $livraison->token = $token;
        $livraison->user_id = $user_id;
        $livraison->pays = $request->pays;
        $livraison->ville = $request->ville;
        $livraison->description = $request->description;

        $livraison->save();

        \Cart::clear();

        session()->flash('success',"Félicitations !!! votre commande a été enrégistrée avec succès.");
        return redirect()->route('mes-commandes');
    }

    public function getlastOrderID()
    {
        $req = Order::select('id')->latest()->first()->get();

        $id = 0;
        foreach ($req as $key => $value) {
            if ($req->count() > 0 ) {
                return $id = $value->id;
            }else {
                return $id = 1;
            }
        }
    }

    public function orders()
    {
        $user = Auth::user();

        $orders = Order::where('user_id',$user->id)->orderBy('id','desc')->get();

        $livraisons = Livraison::where('user_id',$user->id)->orderBy('id','desc')->get();

        return view('frontend.foire.orders')->with([
            'orders'=>$orders,
            'livraisons'=>$livraisons
        ]);
    }

    public function detail_order(Order $order)
    {
        $livraison = $this->getLivraison($order->id);
        //dd($livraison);
        $products = $this->getProducts($order->id);
        //dd($products);

        return view('frontend.foire.order-detail')->with([
            'order'=>$order,
            'livraison'=>$livraison,
            'order_products'=>$products
        ]);
    }

    /**
     * @return livraison
     * retourne les données de livraion d'une commande
     */
    public function getLivraison($order_id)
    {
        $req = Livraison::select('*')->where('order_id',$order_id)->first()->get();

        foreach ($req as $key => $value) {
            return $value;
        }
    }

    /**
     * @return products
     * retourne la liste des produits concernant une commande
     */
    public function getProducts($order_id)
    {
        $req = OrderProduct::select('*')->where('order_id',$order_id)->get();

        $data = [];
        foreach ($req as $key => $value) {
            $data[] =  $value;
        }
        return $data;
    }




}
