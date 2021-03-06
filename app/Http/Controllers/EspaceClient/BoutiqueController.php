<?php

namespace App\Http\Controllers\EspaceClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Boutique;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth as Auth;

class BoutiqueController extends ClientController
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $account_id = $this->getId($user->username);
        //dd($account_id);

        $boutiques = Boutique::where('account_id','=',$account_id)->first();
        //dd($boutiques);

        if ($boutiques) {

            $products = $this->getProducts($account_id);
            return view('espace_client.market.index')->with([
                'user'=>$user,
                'market'=>$boutiques,
                'products'=>$products,
            ]);
        } else {
            return redirect()->route('boutiques.create');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $account_id = $this->getId($user->username);
        //dd($account_id);
        return view('espace_client.market.create')->with([
            'account_id'=>$account_id,
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
            'nom_boutique'=>'required',
            'domaine'=>'required',
            'pays'=>'required',
            'ville'=>'required',
            'quartier'=>'required',
            'contact_boutique'=>'required',
            'email_boutique'=>'required',
            'mode_reglement'=>'required',
            'avatar'=>'required|image',
        ]);

        if ($request->hasFile('avatar')) {

            $avatar = $request->avatar->getClientOriginalName();

            $img = Image::make(request()->file('avatar'))->fit(1200,1000)->save(public_path('/storage/avatars/'.$avatar),80,'jpg');

            //$request->avatar->storeAs('public/avatars',$avatar);

            $account_id = $this->getId($request->acc);

            //dd($account_id);
            $nom = $request->nom_boutique;

            $data = [
                'account_id'=>$request->account_id,
                'nom_boutique'=>$request->nom_boutique,
                'domaine_activite'=>$request->domaine,
                'pays'=>$request->pays,
                'ville'=>$request->ville,
                'quartier'=>$request->quartier,
                'contact_boutique'=>$request->contact_boutique,
                'email_boutique'=>$request->email_boutique,
                'mode_reglement'=>$request->mode_reglement,
                'avatar'=>$avatar,
            ];

            //dd($data);

            Boutique::create($data);

            session()->flash('success',"La espace_client.market $nom a été créer avec succès");
            return redirect()->route('boutiques.index');
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
