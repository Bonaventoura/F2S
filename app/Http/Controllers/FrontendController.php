<?php

namespace App\Http\Controllers;

use App\Account;
use App\Models\Mode;
use App\Models\Activation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
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

    public function getProducts($account)
    {
        return $products = DB::table('boutique_product')
            ->join('boutiques', 'boutique_product.boutique_id', '=', 'boutiques.id')
            ->join('products', 'boutique_product.product_id', '=', 'products.id')
            ->select('products.*', 'boutiques.nom_boutique')
            ->where('boutiques.accounts_id','=',$account)
            ->get();
    }

    public function activer_account()
    {
        $user = Auth::user();
        $modes = Mode::all();
        $account = $this->my_account($user->username);
        $exist = $this->account_exist($user->username);
        $statut = $this->status($account);
        return view('compte.activer')->with([
            'modes'=>$modes,
            'account'=>$account,
            'exist'=>$exist,
            'market'=>'',
            'statut'=>$statut
        ]);
    }

    public function getTransaction($codeRef,$numero_envoi)
    {
        return $result = Activation::where('codeRef',$codeRef)->where('numero_envoi',$numero_envoi)->first();
    }

    public function getAccount($pseudo_cpte,$nom)
    {
        return $result = Account::where('pseudo_cpte',$pseudo_cpte)->where('nom',$nom)->first();
    }

    public function updateCodeRef($codeRef,$a)
    {
        return $result = DB::table('activations')->where('codeRef','=',$codeRef)->update(['codeRef'=>$a]);
    }

    public function updateAccount($pseudo_cpte)
    {
        return $result = DB::table('accounts')->where('pseudo_cpte','=',$pseudo_cpte)->update(['actif'=>1]);
    }

    public function activation(Request $request)
    {
        //return response()->json(['message'=>"Données envoyées avec succès"],200);

        $mode = $request->mode_id;
        /**
         * methode de validation
         */
        if ($mode == 1 || $mode == 2) {
            $this->validate($request,[
                'nom'=>'required',
                'prenoms'=>'required',
                'pseudo'=>'required',
                'numero_envoi'=>'required',
                'mode_id'=>'required',
                'codeRef'=>'required',
                'montant'=>'required',
            ]);
        } elseif ($mode == 3) {
            $this->validate($request,[
                'nom'=>'required',
                'prenoms'=>'required',
                'pseudo'=>'required',
                'numero_mtcn'=>'required',
                'mode_id'=>'required',
                'montant'=>'required',
            ]);
        }else {
            $this->validate($request,[
                'nom'=>'required',
                'prenoms'=>'required',
                'pseudo'=>'required',
                'money_gram'=>'required',
                'mode_id'=>'required',
                'montant'=>'required',
            ]);
        }


        //dd($request->all());


        $codeRef = $request->codeRef;
        $numero_envoi = $request->numero_envoi;
        $nom = $request->nom;
        $pseudo = $request->pseudo;
        $numero_mtcn = $request->numero_mtcn;
        $money_gram = $request->money_gram;

        $transact = $this->getTransaction($codeRef,$numero_envoi);

        //dd($transact);

        $pseudo_cpte = $this->getAccount($request->pseudo,$nom);
        //dd($pseudo_cpte);

        if ($transact && $pseudo_cpte) {

            $a = '';
            //update la table activation où le codeRef = $codeRef dont le codeRef='';
            $update = $this->updateCodeRef($request->codeRef,$a);

            $update_account = $this->updateAccount($pseudo);

            session()->flash('success',"Félicitations,Votre compte est en cours d'activation");
            return redirect()->back();
        } else {
            session()->flash('alert',"Compte en entente d'activation ou transaction pas encore enregistré, veuillez ressayez plus tard");
            return redirect()->back();
        }
        //dd($pseudo_cpte->pseudo_cpte);
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
}
