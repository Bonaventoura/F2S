<?php

namespace App\Http\Controllers\EspaceAdmin;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Groupe;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('espace-admin.index');
    }

    public function all_accounts()
    {
        $results = Account::all()->paginate(15);
        return view('espace-admin.accounts.index')->with(['accounts'=>$results]);
    }

    public function critere()
    {
        $groupes = Groupe::all();
        return view('espace-admin.clubs.critere')->with([
            'groupes'=>$groupes
        ]);
    }

    /**
     * la methode updateClub permet de mettre à jour un compte qui vient d'intégrer un club
     */
    public function updateClub($value)
    {
        return DB::table('accounts')->where('id','=',$value)->update(['groupe'=>1]);
    }

    /**
     * la methode create_club permet de retourner la liste des comptes se trouvant dans une ville donnée  
     */
    public function create_club(Request $request)
    {
        $this->validate($request,[
            'groupe_id'=>'required',
        ]);
        $groupe_id = $request->groupe_id;

        $groupe = Groupe::find($groupe_id);

        $exist = $this->group_exist($groupe_id);

        //dd($exist);

        if ($exist) {
            $countM = $this->getMembers($groupe_id)->count();
            if ($countM >= 100) {
                session()->flash('alert',"Ce club a atteind son nombre maximum");
                return redirect()->back();
            } else {
                $reste = 100 - $countM;
                $dataR = $this->dataRestant($groupe->ville,$reste);

                return view('espace-admin.clubs.create')->with([
                    'data'=>$dataR,
                    'groupe_id'=>$groupe_id,
                    'groupe'=>$groupe
                ]);
            }
            
        } else {

            $ville = $groupe->ville;

            $data = $this->data($ville)->paginate(25);

            return view('espace-admin.clubs.create')->with([
                'data'=>$data,
                'groupe_id'=>$groupe_id,
                'groupe'=>$groupe
            ]);
        }
        
    }

    /**
     * la méthode data permet de retourner les comptes élligible au critères de sélection et qui n'ont pas encore intégré un club
     */
    public function data($ville)
    {
        $results = DB::table('accounts')
                    ->where('ville','=',$ville)
                    ->where('actif','=',0)
                    ->where('groupe','=',0)
                    ->limit(100)
                    ->get();
        return $results;
    }

    /**
     * la methode dataRestant permet de retourner le nombre restant 
     */
    public function dataRestant($ville,$nbre)
    {
        $results = DB::table('accounts')
                    ->where('ville','=',$ville)
                    ->where('actif','=',0)
                    ->where('groupe','=',0)
                    ->limit($nbre)
                    ->get();
        return $results;
    }

    /**
     * cette methode permet de verifier l'existence d'un groupe dans la table club
     */
    public function group_exist($groupe_id)
    {
        $results = DB::table('clubs')->where('groupe_id','=',$groupe_id)->first();
        if ($results) {
            return 1;
        } else {
            return 0;
        }

    }

    /**
     * la methode getMembers prend en paramètre l'id un club puis retourne les membres de ce groupe
     */
    public function getMembers($groupe_id)
    {
         //$results = DB::table('clubs')->select('*')->where('groupe_id','=',$groupe_id)->get();

        return $results = Club::where('groupe_id','=',$groupe_id)->get();
    }
}
