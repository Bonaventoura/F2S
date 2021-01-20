<?php

namespace App\Http\Controllers\EspaceAdmin\Clubs;

use App\Models\Clubs\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clubs\Club;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('espace-admin.projects.index')->with([
            'projects'=>$projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::all();
        return view('espace-admin.projects.create')->with([
            'clubs'=>$clubs
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
            'nom_project'=>'required|unique:projects,nom_project',
            'club_id'=>'required',
            'cahier_charge'=>'required|file',
            'description'=>'required|min:5',
            'budget'=>'required|integer',
            'montant_project'=>'required|integer',
            'duree_project'=>'required|integer'
        ]);

        //dd($request->all());

        if ($request->hasFile('cahier_charge')) {

            $cahier_charge = $request->cahier_charge->getClientOriginalName();

            $request->cahier_charge->storeAs('public/projets',$cahier_charge);

            $data = array(
                'nom_project'=>$request->nom_project,
                'description'=>$request->description,
                'club_id'=>$request->club_id,
                'budget'=>$request->budget,
                'montant_project'=>$request->montant_project,
                'cahier_charge'=>$cahier_charge,
                'duree_project'=>$request->duree_project
            );

            //dd($data);
            Project::create($data); 

            session()->flash('success',"Le projet a été crée  avec succès");

            return redirect()->route('projects.index');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clubs\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clubs\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clubs\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clubs\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
