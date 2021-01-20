<?php

namespace App\Http\Controllers\EspaceAdmin\Clubs;

use App\Account;
use App\Models\Clubs\Club;
use App\Models\Clubs\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EspaceAdmin\AdminController;

class ClubsControler extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes = Groupe::all();
        $clubs = Club::all();
        return view('espace-admin.clubs.index')->with([
            'groupes'=>$groupes,
            'clubs'=>$clubs
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::all();
        $accounts = Account::all();
        return view('espace-admin.clubs.create')->with([
            'groupes'=>$groupes,
            'accounts'=>$accounts,
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
        $groupe_id = $request->groupe_id;

        $groupe = Groupe::find($groupe_id);

        $account_id = $request->account_id;

        $data = [];

        $exits = $this->group_exist($groupe_id);

        $members = $this->getMembers($groupe_id);
        //dd($members);

        //insertion multiple dans la table
        foreach ($account_id as $key => $value) {

            $data[] = [
                'groupe_id'=>$groupe_id,
                'account_id'=>$value
            ];

            Club::create([
                'groupe_id'=>$groupe_id,
                'account_id'=>$value
            ]);

            $gpe = $this->updateClub($value);

        }

        session()->flash('success',"le club a été créer avec succès");
        return redirect()->route('clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        $membres = $this->getMembers($club->groupe_id);
        $gpe_id = $club->groupe_id;
        $gpe = Groupe::find($gpe_id);
        return view('espace-admin.clubs.show')->with([
            'membres'=>$membres,
            'groupe'=>$gpe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }
}
