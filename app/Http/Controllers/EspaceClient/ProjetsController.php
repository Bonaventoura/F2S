<?php

namespace App\Http\Controllers\EspaceClient;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Projet;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProjetsController extends ClientController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->username;
        return view('espace-client.projet.index')->with([
            'user'=>$user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->username;

        $account = $this->client_account($user);

        foreach ($account as $key => $value) {

            $id = $value->id;
            $nom = $value->nom;
            $prenoms = $value->prenoms;
            $sexe = $value->sexe;
            $email = $value->email;
            $num_tel = $value->num_tel;

        }

        //dd($email);
        return view('espace-client.projet.create')->with([
            'user'=>$user,
            'account'=>$account,
            'id'=>$id,
            'nom'=>$nom,
            'prenoms'=>$prenoms,
            'sexe'=>$sexe,
            'email'=>$email,
            'num_tel'=>$num_tel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'cout_projet'=>'required|integer',
            'apport_personnel'=>'required|integer',
            'description'=>'required|max:150',
            'domaine'=>'required',
            'plan_affaire'=>'required',
        ]);



        if ($request->hasFile('plan_affaire')) {

            $plan_affaire = $request->plan_affaire->getClientOriginalName();

            //dd($plan_affaire);

            $request->plan_affaire->storeAs('public/docs',$plan_affaire);

            $data = array(
                'accounts_id'=>$request->accounts_id,
                'sm'=>$request->sm,
                'description'=>$request->description,
                'cout_projet'=>$request->cout_projet,
                'apport_personnel'=>$request->apport_personnel,
                'nature_projet'=>$request->nature_projet,
                'domaine'=>$request->domaine,
                'actualite'=>$request->actualité,
                'type_remboursement'=>$request->type_remboursement,
                'taille_entreprise'=>$request->taille_entreprise,
                'plan_affaire'=>$plan_affaire
            );

           /* dd($data);
            Projet::create($data); */

            session()->flash('success',"Le projet a été ajouté avec succès");

            return redirect()->route('projets.index');

        }





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
