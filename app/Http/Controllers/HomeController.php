<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->username;

        $account = $this->my_account($user);

        $photo_profile = $this->profile($account);

        //dd($photo_profile);

        $email = $this->getEmail($account);

        $code_parrain = $this->getCodeParrain($account);

        $filleuls = $this->filleuls($code_parrain);

        $nbres = $this->getNbreFilleul($code_parrain);

        $parrainer = $this->parrainer($code_parrain);

        $this->grade($code_parrain);

        $niveau = $this->getNiveau($code_parrain);

        $lien ="http://localhost:8000/compte/create/". $this->get_lien($account);
        //dd($lien);

        $mesFilleuls = $this->generation_deux($code_parrain);

        //dd($mesFilleuls);

        $status = $this->status($account);

        //dd($status);

        return view('home')->with([
            'user'=>$user,
            'pseudo'=>$account,
            'email'=>$email,
            'lien'=>$lien,
            'filleuls'=>$filleuls,
            'parrainer'=>$parrainer,
            'niveau'=>$niveau,
            'mesfilleuls'=>$mesFilleuls,
            'photo_profile'=>$photo_profile,
            'status'=>$status,
        ]);

    }

    public function pseudo_parrain($code_parrain)
    {
        $accounts = DB::table('accounts')->select('*')
        ->where('code','=',$code_parrain)
        ->get();

        foreach ($accounts as $key => $account) {
            return $account->nom;
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


}
