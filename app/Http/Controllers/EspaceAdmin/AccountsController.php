<?php

namespace App\Http\Controllers\EspaceAdmin;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    public function index()
    {
        $results = Account::all()->paginate(15);
        return view('espace-admin.accounts.index')->with(['accounts'=>$results]);
    }

    public function show($nom)
    {
        $id = $this->getID($nom);

        $account = Account::find($id);

        $code_parrain = $this->getCodeParrain($account->pseudo);
        //dd($code_parrain);
        $filleuls = $this->filleuls($code_parrain);

        $nbres = $this->getNbreFilleul($code_parrain);
        //dd($nbres);
        //$niveau = $this->getNiveau($code_parrain);

        $generation_deux = $this->generation_deux($code_parrain);

        $gen3 = $this->generation_trois($code_parrain);
        //dd($gen3);

        $gen4 = $this->generation_quatre($code_parrain);

        $gen5 = $this->generation_cinq($code_parrain);

        $gen6 = $this->generation_six($code_parrain);

        $gen7 = $this->generation_sept($code_parrain);

        $gen8 = $this->generation_huit($code_parrain);

        //dd($generation_deux);

        $status = $this->status($account->pseudo);

        $solde = $this->getSolde($account->id);

        //dd($solde);

        return view('espace-admin.accounts.show')->with([
            'account'=>$account,
            'filleuls'=>$filleuls,
            'generation_deux'=>$generation_deux,
            'nbresF'=>$nbres,
            'niveau'=>'0',
            'status'=>$status,
            'gen3'=>$gen3,
            'gen4'=>$gen4,
            'gen5'=>$gen5,
            'gen6'=>$gen6,
            'gen7'=>$gen7,
            'gen8'=>$gen8,
        ]);
    }

    public function getAccount($nom)
    {
        $results = Account::where('nom','=',$nom)->first();
    }

    public function getID($nom)
    {
        $accounts = DB::table('accounts')->select('*')
        ->where('nom','=',$nom)
        ->get();

        foreach ($accounts as $key => $account) {
            return $account->id;
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
