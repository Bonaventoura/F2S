<?php

namespace App\Http\Controllers;

use App\Account;
use App\Filleul;
use App\Models\Role;
use App\Models\Solde;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * la fonction parrain permet de verifier l'existence d'un parrain
     */
    public function parrain($pseudo_parrain)
    {
        $parrains = DB::table('accounts')->select('*')
        ->where('pseudo','=',$pseudo_parrain)
        ->get();

        foreach($parrains as $parrain)
        {
            return $parrain->pseudo;
        }
    }

    /**
     * La fonction getCodeParrain retourne le code d'un parrain
     */
    public function getCodeParrain($pseudo_parrain)
    {
        $codes =  DB::table('accounts')->select('code')
        ->where('pseudo','=',$pseudo_parrain)
        ->get();

        foreach($codes as $code)
        {
            return $code->code;
        }
    }

    /**
     * la methode my_account retourne le pseudo d'un compte
     */
    public function my_account($user)
    {
        $accounts = DB::table('accounts')->select('*')
        ->where('pseudo','=',$user)
        ->get();

        foreach ($accounts as $key => $account) {
            return $account->pseudo;
        }
    }

    /**
     * @return email
     */
    public function getEmail($pseudo)
    {
        $accounts = DB::table('accounts')->select('*')
        ->where('pseudo','=',$pseudo)
        ->get();

        foreach ($accounts as $key => $account) {
            return $account->email;
        }
    }

    /**
     * @return pseudo 
     */
    public function pseudo($code_parrain)
    {
        $accounts = DB::table('accounts')->select('*')
        ->where('code','=',$code_parrain)
        ->get();

        foreach ($accounts as $key => $account) {
            return $account->nom;
        }
    }

    /**
     * Cette fonction permet de retourner le code d'un parrain pour le lien de parrainage
     */
    public  function get_lien($pseudo)
    {
        $req = DB::table('accounts')->select('*')
        ->where('pseudo','=',$pseudo)
        ->get();

        foreach ($req as $key => $result) {
            return $result->code;
        }
    }

    /**
     * La methode getLastId() permet de retourner l'id du nouveau compte créé
     */
    public function getLastId()
    {
        $accounts = Account::all();

        $count = $accounts->count();
        //dd($count);
        //s'il existe déjà un ou plusieurs compte, alors on retourne l'id du dernier compte +1 sinon on retourne 1
        if ($count >0 ) {

            $results = DB::table('accounts')->latest()->get();

            foreach ($results as $result) {
                return $result->id+1;
            }
            //dd($result);
        } else {
            return $result = 1;
            //dd($result);
        }

    }

    /**
     * Cette fonction permet de retrouver le pseudo d'un parrain
     */
    public function getPseudo($code)
    {
        $results = DB::table('accounts')->select('pseudo')
        ->where('code','=',$code)
        ->get();

        foreach ($results as $key => $result) {
            return $result->pseudo;
        }
    }

    /**
     * Retourne le code des filleuls d'un parrain
     */
    public function getFilleulCode($code_parrain)
    {
        $results = DB::table('filleuls')->select('*')
        ->where('code_parrain','=',$code_parrain)
        ->get();

        return $results;

    }

    /**
     * return la liste des filleuls d'un parrain
     */
    public function filleuls($code_parrain)
    {
        return DB::table('accounts')
        ->join('filleuls','filleuls.code_filleuls','accounts.id')
        ->select('accounts.*','filleuls.code_parrain')
        ->where('filleuls.code_parrain','=',$code_parrain)
        ->get();
    }

    public function getNbreFilleul(int $code_parrain)
    {

        $nbres = DB::table('filleuls')
                    ->select(DB::raw('count(code_parrain) as nbre_filleuls'))
                    ->where('code_parrain','=',$code_parrain)
                    ->groupBy('code_parrain')
                    ->get();

        //return $nbres;

       $nbres =  Filleul::all()->where('code_parrain','=',$code_parrain)->where('code_filleuls','!=',$code_parrain);

       return $nbres->count();

    }

    public function parrainer($code_parrain)
    {
        $nbres_filleuls = $this->getNbreFilleul($code_parrain);

        if ($nbres_filleuls >= 3) {
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * la methode getNiveau retourne le niveau d'un parrain
     */
    public function getNiveau($code_parrain)
    {
        $niveaux = DB::table('niveaux')->select('*')
        ->where('code_parrain','=',$code_parrain)
        ->get();

        foreach ($niveaux as $key => $niveau) {
            return $niveau->niv;
        }
    }

    /**
     * la méthode getSolde permet de retourner le compte solde d'un client
     */
    public function getSolde($account)
    {
        $solde = DB::table('soldes')->select('*')
        ->where('account_id','=',$account)
        ->get();

        foreach ($solde as $key => $value) {
            return $value->montant_actuel;
        }
    }

    /**
     * la méthode updateNiveau fait la maj de niveau d'un parrain
     */
    public function updateNiveau($code_parrain,$a)
    {
        return DB::table('niveaux')
                    ->where('code_parrain','=',$code_parrain)
                    ->update(['niveau_parrain'=>$a]);
    }

    public function grade($code_parrain)
    {
        $nbres_filleuls = $this->getNbreFilleul($code_parrain);

        switch ($nbres_filleuls) {
            case '3':
                return $this->updateNiveau($code_parrain,1);
                break;

            case '9':
                return $this->updateNiveau($code_parrain,2);
                break;

            case '27':
                return $this->updateNiveau($code_parrain,3);
                break;

            case '81':
                return $this->updateNiveau($code_parrain,4);
                break;

            case '243':
                return $this->updateNiveau($code_parrain,5);
                break;

            case '729':
                return $this->updateNiveau($code_parrain,6);
                break;

            case '2187':
                return $this->updateNiveau($code_parrain,7);
                break;

            case '6561':
                return $this->updateNiveau($code_parrain,8);
                break;

            default:
                return 0;
                break;
        }

    }

    public function getGeneration($code_filleul)
    {
        $results = DB::table('accounts')
                ->join('filleuls','filleuls.code_filleuls','accounts.id')
                ->select('accounts.*')
                ->where('filleuls.code_filleuls','=',$code_filleul)
                ->get();

        return $results;
    }

    public function filleuls_codeP($code_filleuls)
    {
            $results = DB::table('accounts')
                    ->join('filleuls','filleuls.code_filleuls','accounts.id')
                    ->select('accounts.*')
                    ->where('filleuls.code_filleuls','=',$code_filleuls)
                    ->get();

        foreach ($results as $key => $result) {
            return $result->code;
        }
    }

    /**
     * la méthode generation_deux permet de retourner les filleuls de la 2e generation d'un parrain donc 9 filleuls
     */
    public function generation_deux($code_parrain)
    {
        $mesFilleuls = $this->getFilleulCode($code_parrain);

        //dd($mesFilleuls);

        $count = $mesFilleuls->count();

        $generation2 = array();

        $informations = array();

        $code_filleuls = array();


        $generation1['parrain'] = '';

        foreach ($mesFilleuls as $key => $filleuls) {


            $code_filleuls_parrain = $this->filleuls_codeP($filleuls->code_filleuls);

            $generation1 = $this->filleuls($code_filleuls_parrain);


            $parrain = $this->pseudo($code_filleuls_parrain);


            $informations[] = [
                'id' => $filleuls->code_filleuls,
                'code_filleul_parrain'=>$this->filleuls_codeP($filleuls->code_filleuls),
                'code_parrain'=>$filleuls->code_parrain,
                'generations_une'=>$generation1,
                'parrain' =>$parrain
            ];


            //dd($informations);

            //$generation1['parrain'] = $parrain;
            $generation2[] = $generation1;

        }
        return $this->generation2 = $generation2;

    }


    /**
     * la méthode generation_trois retourne les filleuls de la 3e generation d'un parrain donc 27 filleuls
     */
    public function generation_trois($code_parrain)
    {
        $generation2 = $this->generation_deux($code_parrain);

        $informations = array();

        foreach ($generation2 as $key => $gen2) {


            $informations[] = [
                $gen2
            ];

            foreach ($gen2 as $key => $value) {

                $gen3 = $this->filleuls($value->code);

                $informations[] = [
                    'code'=>$value->code
                ];

                $generation3[] = $gen3;

            }
        }

        if (!empty($generation3)) {
            return $this->generation3 = $generation3;
        } else {
            return 'pas encore';
        }


    }


    /**
     * la méthode generation_quatre retourne les filleuls de la 4ème génération d'un parrain donc 81 filleuls
     * 81 = 27 * 3
     */
    public function generation_quatre($code_parrain)
    {

        if (!empty($generation3)) {

            $generation3 = $this->generation_trois($code_parrain);

            //dd($generation3);
            $informations = array();

            foreach ($generation3 as $key => $gen3) {

                $informations[] = [
                    $gen3
                ];

                foreach ($gen3 as $key => $value) {

                    $gen4 = $this->filleuls($value->code);

                    $informations[] = [
                        'code'=>$value->code
                    ];

                    $generation4[] = $gen4;
                }
            }

            if (!empty($generation4)) {
                return $this->generation4 = $generation4;
            } else {
                return false;
            }

        } else {
            return 'niveau inferieur est incomplet';
        }

    }



    /**
     * la méthode generation_cinq retourne les filleuls de la cinquième génération donc 243 filleuls
     * 243 = 81*3
     */
    public function generation_cinq($code_parrain)
    {

        if (!empty($generation4)) {
            $generation4 = $this->generation_quatre($code_parrain);
            //dd($generation4);

            $informations = array();

            foreach ($generation4 as $key => $gen4) {
                $informations[] = [$gen4];

                foreach ($gen4 as $key => $value) {

                    $gen5 = $this->filleuls($value->code);

                    $generation5[] = $gen5;
                }
            }

            if (!empty($generation5)) {
                return $this->generation5 = $generation5;
            } else {
                return $msg = "ce filleul n'a pas encore bouclé la generation 4";
            }

        } else {
            return $msg = "veuillez motiver vos filleuls afin de compléter le niveau 4 d'abord";
        }

    }


    /**
     * la méthode generation_six retourne les filleuls de la sixième génération donc 729 filleuls
     * 729 = 243*3
     */
    public function generation_six($code_parrain)
    {
        if (!empty($generation5)) {

            $generation5 = $this->generation_cinq($code_parrain);

            $informations = array();

            foreach ($generation5 as $key => $gen5) {
                $informations[]= [$gen5];

                foreach ($gen5 as $key => $value) {

                    $gen6 = $this->filleuls($value->code);

                    $generation6[] = $gen6;
                }
            }

            if (!empty($generation6)) {
                return $this->generation6 = $generation6;
            } else {
                return $msg = "ce filleul n'a pas encore bouclé la generation 5";
            }

        } else {
            return $msg = "veuillez motiver vos filleuls afin de compléter le niveau 5 d'abord";
        }

    }


    /**
     * la méthode generation_sept retourne les filleuls de la 7ème génération donc 2187
     */
    public function generation_sept($code_parrain)
    {
        if (!empty($generation6)) {

            $generation6 = $this->generation_six($code_parrain);

            $informations = array();

            foreach ($generation6 as $key => $gen6) {
                $informations[]= [$gen6];

                foreach ($gen6 as $key => $value) {

                    $gen7 = $this->filleuls($value->code);

                    $generation7[] = $gen7;
                }
            }

            if (!empty($generation7)) {
                return $this->generation7 = $generation7;
            } else {
                return $msg = "ce filleul n'a pas encore bouclé la generation 6";
            }

        } else {
            return $msg = "veuillez motiver vos filleuls afin de compléter le niveau 6 d'abord";
        }
    }

    public function generation_huit($code_parrain)
    {
        if (!empty($generation7)) {

            $generation7 = $this->generation_sept($code_parrain);

            $informations = array();

            foreach ($generation7 as $key => $gen7) {
                $informations[]= [$gen7];

                foreach ($gen7 as $key => $value) {

                    $gen8 = $this->filleuls($value->code);

                    $generation8[] = $gen8;
                }
            }

            if (!empty($generation8)) {
                return $this->generation8 = $generation8;
            } else {
                return $msg = "ce filleul n'a pas encore bouclé la generation 7";
            }

        } else {
            return $msg = "veuillez motiver vos filleuls afin de compléter le niveau 7 d'abord";
        }
    }



    public function test()
    {
        $array = array(
                'fruits' => array( 'pommes', 'tomates', 'abricots' ),
                'animaux' => array( 'chats', 'chiens' ),
                'pays' => array( 'Suisse', 'France', 'Angleterre' ) );

        foreach( $array as $key => $value )
        {
            dd($key)  . ': <br />';

            foreach( $value as $valeur ){
                dd( $valeur)  . '<br />';
            }
        }
    }

    public function code_filleul($informations)
    {

        $id = $this->getinformations($informations);

        return DB::table('accounts')
        ->join('filleuls','filleuls.code_filleuls','accounts.id')
        ->select('accounts.*')
        ->where('filleuls.code_filleuls','=',$id)
        ->get();
    }

    public function getinformations($informations)
    {
        $results = DB::table('filleuls')->select('*')
        ->where('code_filleuls','=',$informations)
        ->get();

        foreach ($results as $key => $result) {
            return $result->code_filleuls;
        }
    }

    public function filleuls_exists($code_p)
    {
        $results = DB::table('filleuls')->select('*')
        ->where('code_filleuls','=',$code_p)
        ->get();

        if ($results == true) {
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * la méthode account_exist permet de vérifier l'existence d'un compte client
     */
    public function account_exist(string $username)
    {
        $result = Account::where('pseudo','=',$username)->first();

        if ($result) {
            return $msg=1;
        } else {
            return $msg =0;
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

    /**
     * @return role_id
     * role = client_f2s
     */
    public function user_role()
    {
        $role = Role::select('id')->where('name','=','client_f2s')->get();
        foreach ($role as $key => $value) {
            return $value->id;
        }
    }

}
