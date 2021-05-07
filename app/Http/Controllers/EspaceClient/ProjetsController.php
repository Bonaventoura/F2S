<?php

namespace App\Http\Controllers\EspaceClient;


use Illuminate\Http\Request;
use App\Models\Client\Projet;
use App\Http\Controllers\Controller;
use App\Models\Client\Confirmation;
use App\Models\Domaine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjetsController extends ClientController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //dd($user);
        $account_id = $this->getId($user->username);
        //dd($account_id);
        $projets = Projet::where('account_id',$account_id)->get();
        //dd($projets);
        return view('espace_client.projets.index')->with([
            'user'=>$user,
            'projets'=>$projets,
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
        //dd($account);
        //dd($email);
        return view('espace_client.projets.create')->with([
            'user'=>$user,
            'account'=>$account,
            'domaines'=>Domaine::all(),
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
            'domaine_id'=>'required',
            'plan_affaire'=>'required',
            'nom_projet'=>'required'
        ]);



        if ($request->hasFile('plan_affaire')) {

            $plan_affaire = $request->plan_affaire->getClientOriginalName();

            //dd($plan_affaire);
            $request->plan_affaire->storeAs('public/docs',$plan_affaire);

            $data = array(
                'account_id'=>$request->account_id,
                'nom_projet'=>$request->nom_projet,
                'sm'=>$request->sm,
                'description'=>$request->description,
                'cout_projet'=>$request->cout_projet,
                'apport_personnel'=>$request->apport_personnel,
                'nature_projet'=>$request->nature_projet,
                'domaine_id'=>$request->domaine_id,
                'actualite'=>$request->actualité,
                'nature_projet'=>'',
                'type_remboursement'=>$request->type_remboursement,
                'taille_entreprise'=>$request->taille_entreprise,
                'plan_affaire'=>$plan_affaire,
                'duree_projet'=>$request->duree_projet
            );

            //dd($data);
            Projet::create($data);

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
    public function show(Projet $projet)
    {
        $user = Auth::user();
        $account = $this->client_account($user->username);

        $carneva = $this->verif_carneva($projet->id);

        $calendar = $this->verif_calendar($projet->id);
        //dd($calendar);
        $confirm_at = $this->confirm_at($projet->id);

        //dd($confirm_at);
        return view('espace_client.projets.show')->with([
            'user'=>$user,
            'projet'=>$projet,
            'account'=>$account,
            'carneva'=>$carneva,
            'calendar'=>$calendar,
            'confirm_at'=>$confirm_at
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        $user = Auth::user()->username;

        $account = $this->client_account($user);
        //dd($account);
        //dd($email);
        return view('espace_client.projets.edit')->with([
            'user'=>$user,
            'account'=>$account,
            'domaines'=>Domaine::all(),
            'projet'=>$projet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        if ($request->hasFile('plan_affaire')) {
            $plan_affaire = $request->plan_affaire->getClientOriginalName();

            $request->plan_affaire->storeAs('public/docs',$plan_affaire);
            $projet->plan_affaire = $plan_affaire;
        }
        $data = array(
            'account_id'=>$request->account_id,
            'nom_projet'=>$request->nom_projet,
            'sm'=>$request->sm,
            'description'=>$request->description,
            'cout_projet'=>$request->cout_projet,
            'apport_personnel'=>$request->apport_personnel,
            'nature_projet'=>$request->nature_projet,
            'domaine_id'=>$request->domaine_id,
            'actualite'=>$request->actualité,
            'nature_projet'=>'',
            'type_remboursement'=>$request->type_remboursement,
            'taille_entreprise'=>$request->taille_entreprise,
            'duree_projet'=>$request->duree_projet
        );
        $projet->update($data);

        session()->flash('success',"Le projet a été modifié avec succès");
        return redirect()->route('projets.index');
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
