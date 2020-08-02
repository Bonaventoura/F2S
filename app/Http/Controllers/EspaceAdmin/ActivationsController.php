<?php

namespace App\Http\Controllers\EspaceAdmin;

use App\Models\Activation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mode;

class ActivationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modes = Mode::all();
        $activations = Activation::all();
        return view('espace-admin.activation.index')->with([
            'modes'=>$modes,
            'activations'=>$activations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modes = Mode::all();
        return view('espace-admin.activation.add_transact')->with([
            'modes'=>$modes,
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
        $mode = $request->mode_id;
        /**
         * methode de validation 
         */
        if ($mode == 1 || $mode == 2) { 
            /**
             * ici le mode choisi est le payement local (tmoney ou flooz)
             */
            $this->validate($request,[
                'numero_envoi'=>'required',
                'mode_id'=>'required',
                'codeRef'=>'required',
                'montant'=>'required',
            ]);

            $numero_mtcn = 'null';
            $money_gram = 'null';

            Activation::create([
                'mode_id'=>$request->mode_id,
                'numero_envoi'=>$request->numero_envoi,
                'codeRef'=>$request->codeRef,
                'montant'=>$request->montant,
                'date_envoi'=>$request->date_envoi,
                'numero_mtcn'=>$numero_mtcn,
                'money_gram'=>$money_gram
            ]);

        } elseif ($mode == 3) {

            /**
             * ici le payement se fait avec werstern union
             */
            $this->validate($request,[
                'numero_mtcn'=>'required',
                'mode_id'=>'required',
                'montant'=>'required',
            ]);

            $numero_envoi = 'null';
            $codeRef = 'null';
            $money_gram = 'null';

            Activation::create([
                'mode_id'=>$request->mode_id,
                'numero_mtcn'=>$request->numero_mtcn,
                'numero_envoi'=>$numero_envoi,
                'codeRef'=>$codeRef,
                'money_gram'=>$money_gram,
                'montant'=>$request->montant,
                'date_envoi'=>$request->date_envoi
            ]);

        }else {

            /**
             * money gram
             */
            $this->validate($request,[
                'money_gram'=>'required',
                'mode_id'=>'required',
                'montant'=>'required',
            ]);

            $numero_envoi = 'null';
            $codeRef = 'null';
            $numero_mtcn = 'null';

            Activation::create([
                'mode_id'=>$request->mode_id,
                'numero_envoi'=>$numero_envoi,
                'codeRef'=>$codeRef,
                'money_gram'=>$request->money_gram,
                'montant'=>$request->montant,
                'date_envoi'=>$request->date_envoi
            ]);
        }

        
        session()->flash('success',"La transaction a été enregistré avec succès");

        return redirect()->route('activations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function show(Activation $activation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function edit(Activation $activation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activation $activation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activation $activation)
    {
        //
    }
}
