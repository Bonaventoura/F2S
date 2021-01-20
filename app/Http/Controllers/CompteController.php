<?php

namespace App\Http\Controllers;

use App\User;
use App\Niveau;
use App\Account;
use App\Filleul;
use App\Models\Solde;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class CompteController extends Controller
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

        if (request('lien')) {

            $lien = request('lien');

            $pseudo_parrain = $this->getPseudo($lien);

            return view('compte.create')->with('pseudo_parrain',$pseudo_parrain);
        }else {
            return view('compte.create');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'nom'=>'required',
            'prenoms'=>'required',
            'sexe'=>'required',
            'date_n'=>'required',
            'num_tel'=>'required',
            'email'=>'required|',
            'pseudo'=>'required',
            'password'=>'required',
            'pays'=>'required',
            'ville'=>'required',
        ]);

        $password = Hash::make($request->password);

        //dd($password);
        $random = rand(1000,1000000);

        $code = rand(1000,1000000);

        $pseudo_parrain = $request->pseudo_parrain;

        $account = new Account;

        /**
         * la photo de profile
         */
        if ($request->hasFile('photo_profil')) {

            $photo_profil = $request->photo_profil->getClientOriginalName();

            $img = Image::make(request()->file('photo_profil'))->fit(90,70)->save(public_path('/storage/profil/'.$photo_profil),80,'jpg');

            //dd($photo_profil);
            //$request->photo_profil->storeAs('public/profil',$photo_profil);

            $account->nom = $request->nom;
            $account->prenoms = $request->prenoms;
            $account->sexe = $request->sexe;
            $account->pays = $request->pays;
            $account->ville = $request->ville;
            $account->date_n = $request->date_n;
            $account->num_tel = $request->num_tel;
            $account->email = $request->email;
            $account->pseudo = $request->pseudo;
            $account->password = $request->password;
            $account->code = $code;
            $account->photo_profil = $photo_profil;


            /**
             * le pseudo du parrain existe, donc c'est un parrainage
             */
            if (isset($pseudo_parrain)) {

                $code_parrain = $this->getCodeParrain($pseudo_parrain);

                $code_filleul = $this->getLastId() ;

                //sauvegarder le filleul

                $filleul = new Filleul;

                $filleul->code_filleuls = $code_filleul;
                $filleul->code_parrain = $code_parrain;
                $filleul->pseudo_parrain = $this->pseudo($code_parrain);

                $user = new User;

                $user->name = $request->nom;
                $user->username = $request->pseudo;
                $user->email = $request->email;
                $user->password = $password;

                /*niveau
                $niveau = new Niveau;

                $niveau->code_parrain= $code; */

                $solde = new Solde;

                $solde->account_id = $this->getLastId();

                $solde->niveau_id = 1;

                $solde->montant_actuel = 0;

                //dd($solde);

                $parrain = $this->parrain($request->pseudo_parrain);

                $parrainage = $this->parrainer($code_parrain);

                if($parrain){

                    if ($parrainage) {

                        session()->flash('error',"le parrain $pseudo_parrain a déjà parrainer 3 personnes");

                        return redirect()->back();
                    } else {

                        $account->save();

                        $user->save();

                        $filleul->save();

                        $solde->save();

                        session()->flash('success','Votre compte a été crée avec succès, veuillez vous connectez pour valider le compte');

                        return redirect()->back();
                    }

                }else{
                    session()->flash('error',"le pseudo du parrain $pseudo_parrain n'existe pas ou n'est pas valide");

                    return redirect()->back();
                }

            } else {

                $code_parrain = $code;

                $filleul = new Filleul;

                $filleul->code_filleuls = $code;
                $filleul->code_parrain = $code_parrain;
                $filleul->pseudo_parrain = $request->pseudo;

                //dd($filleul);

                //create user account
                $user = new User;

                $user->name = $request->nom;
                $user->username = $request->pseudo;
                $user->email = $request->email;
                $user->password = $password;

                 //solde
                $solde = new Solde;

                $solde->account_id = $this->getLastId();;

                $solde->niveau_id = 1;

                $solde->montant_actuel = 0;

                //dd($solde);

                $account->save();

                $user->save();

                $filleul->save();

                $solde->save();

                session()->flash('success','Votre compte a été crée avec succès, veuillez vous connectez pour valider le compte');

                return redirect()->back();

            }

        }else {

            $account->nom = $request->nom;
            $account->prenoms = $request->prenoms;
            $account->sexe = $request->sexe;
            $account->pays = $request->pays;
            $account->ville = $request->ville;
            $account->date_n = $request->date_n;
            $account->num_tel = $request->num_tel;
            $account->email = $request->email;
            $account->pseudo = $request->pseudo;
            $account->password = $password;
            $account->code = $code;

            $code_filleul = $this->getLastId() ;

            if (isset($pseudo_parrain)) {

                $code_parrain = $this->getCodeParrain($pseudo_parrain);

                //sauvegarder le filleul

                $filleul = new Filleul;

                $filleul->code_filleuls = $code_filleul;
                $filleul->code_parrain = $code_parrain;
                $filleul->pseudo_parrain = $this->pseudo($code_parrain);

                $user = new User;

                $user->name = $request->nom;
                $user->username = $request->pseudo;
                $user->email = $request->email;
                $user->password = $password;

                //solde
                $solde = new Solde;

                $solde->account_id = $this->getLastId();;

                $solde->niveau_id = 1;

                $solde->montant_actuel = 0;

                dd($solde);

                $parrain = $this->parrain($request->pseudo_parrain);

                $parrainage = $this->parrainer($code_parrain);

                if($parrain){

                    if ($parrainage) {

                        session()->flash('error',"le parrain $pseudo_parrain a déjà parrainer 3 personnes");

                        return redirect()->back();
                    } else {

                        $account->save();

                        $user->save();

                        $filleul->save();

                        $solde->save();

                        session()->flash('success','Votre compte a été crée avec succès, veuillez vous connectez pour valider le compte');

                        return redirect()->back();
                    }

                }else{
                    session()->flash('error',"le pseudo parrain $pseudo_parrain n'existe pas");

                    return redirect()->back();
                }

            } else {

                $code_parrain = $code;

                $filleul = new Filleul;

                $filleul->code_filleuls = $code_filleul;
                $filleul->code_parrain = $code_parrain;
                $filleul->pseudo_parrain = $request->pseudo;

                //create user account
                $user = new User;

                $user->name = $request->nom;
                $user->username = $request->pseudo;
                $user->email = $request->email;
                $user->password = $password;

                 //niveau
                $solde = new Solde;

                $solde->account_id = $this->getLastId();

                $solde->niveau_id = 1;

                $solde->montant_actuel = 0;

                //dd($solde);

                $account->save();

                $user->save();

                $filleul->save();

                $solde->save();

                session()->flash('success','Votre compte a été crée avec succès, veuillez vous connectez pour valider le compte');

                return redirect()->back();

            }


        }





        //la dernière personne qui vient de s'inscrire est le filleul


        $email = $request->email;
        //Mail::to($email)->send(new WelcomeUserMail());


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
