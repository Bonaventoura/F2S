<?php

namespace App\Http\Controllers\EspaceAdmin;

use App\Models\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupesControler extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('espace-admin.groupes.index')->with('groupes',Groupe::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['ville'=>'required']);

        $random = rand(0,10000);
        $str = \str_random(5);
        $nom = 'Club'.$random.'-'.$request->ville;

        //dd($nom);

        Groupe::create([
            'nom'=>$nom,
            'ville'=>$request->ville,
        ]);
        session()->flash('success',"Le club a été  créer avec succès");
        return redirect()->route('groupes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(Groupe $groupe)
    {

        $membres = $this->getMembers($groupe->id);
        //dd($membres);
        return view('espace-admin.groupes.show')->with([
            'membres'=>$membres,
            'groupe'=>$groupe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(Groupe $groupe)
    {
        return view('espace-admin.groupes.edit')->with('groupe',$groupe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groupe $groupe)
    {
        $groupe->ville = $request->ville;
        $groupe->update();
        session()->flash('success',"groupe modifié avec succès");
        return redirect()->route('groupes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groupe $groupe)
    {
        //$groupe->clubs()->delete();
        $groupe->delete();
        session()->flash('success',"Club supprimé avec succès");
        return redirect()->back();
    }
}
