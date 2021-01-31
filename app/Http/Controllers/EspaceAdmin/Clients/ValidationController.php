<?php

namespace App\Http\Controllers\EspaceAdmin\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Carneva;
use App\Models\Client\Confirmation;
use App\Models\Client\Projet;

class ValidationController extends Controller
{
    /**
     * @return projets
     */
    public function index()
    {
        $projets = Projet::orderBy('id','desc')->paginate(12);
        $carnevas = Carneva::orderBy('id','desc')->paginate(12);
        $confirmations = Confirmation::orderBy('id','desc')->paginate(12);
        return view('espace-admin.clients.projets.index')->with([
            'projets'=>$projets,
            'carnevas'=>$carnevas,
            'confirmations'=>$confirmations
        ]);
    }

    public function detail_projet($id)
    {
        $projet = $this->getProjet($id);

        $account = $this->getAccount($id);
        //dd($account);
        return view('espace-admin.clients.projets.projet-detail')->with([
            'projet'=>$projet,
            'account'=>$account
        ]);
    }

    public function getProjet($projet_id)
    {
        $req = Projet::where('id','=',$projet_id)->get();
        foreach ($req as $key => $value) {
            return $value;
        }
    }

    public function getAccount($id)
    {
        $projet = $this->getProjet($id);

        $req = $projet->account()->get();

        foreach ($req as $key => $value) {
            return $value;
        }
    }


}
