<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Client\Product;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

/*
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
*/

Route::get('/','WelcomeController@index')->name('welcome');

Route::post('/fetch-user','WelcomeController@fetch_user')->name('fetch-user');

Route::resource('compte', 'CompteController');

Route::get('/services','WelcomeController@services')->name('services');

Route::get('foire','FoireController@index')->name('foire.online');

Route::get('foire/boutique/{boutique}','FoireController@show')->name('foire.show');

Route::get('foire/recherche','FoireController@search')->name('foire.search');

Route::get('foire/cart','CartController@cart')->name('cart');

Route::post('/add','CartController@add')->name('cart.add');

Route::post('/update', 'CartController@update')->name('cart.update');

Route::post('/remove', 'CartController@remove')->name('cart.remove');

Route::post('/clear', 'CartController@clear')->name('cart.clear');

//Route::get('foire/checkout','FoireController@checkout')->name('foire.checkout');

Route::get('foire/commande','CheckoutController@index')->name('foire.checkout');

Route::post('foire/register','FoireController@register')->name('foire.register');


//Ecommerce

Route::get('ecommerce','ShoppingController@index')->name('shopping');

Route::get('/form', function () {
    $products = Product::all();
    return view('e-commerce.form')->with(['products'=>$products]);
})->name('form');







Route::get('filleul/{id}', function () {

    $code = request('id');
    $filleuls = DB::table('accounts')
                ->join('filleuls','filleuls.code_filleuls','accounts.id')
                ->select('accounts.*')
                ->where('filleuls.code_parrain','=',$code)
                ->get();


    if ($filleuls) {
        return view('filleuls_indirect')->with([
            'pseudo'=>'pseudo',
            'filleuls'=>$filleuls
        ]);
    } else {
        return 'false';
    }


    //return $filleuls;

})->name('filleul');


Route::get('/image', function () {


    $img = Image::make('header-color.jpg')->resize(300,200);

    $img->save('images/header.jpg',80,'jpg');

    //return view('test-image');
});


Route::post('/upload', function () {

    // resizing an uploaded file
    $filename = request('image')->getClientOriginalName();
    //dd($filename);
    Image::make(request()->file('image'))->resize(300, 200)->save('images/'.$filename);
    return redirect()->back()->with('success');
});


Route::get('compte/create/{lien}','CompteController@create');


Route::get('activer','FrontendController@activer_account')->name('activer.account');

Route::post('activer','FrontendController@activation')->name('account.activation');

//Espace Client
Route::group(['middleware' => ['auth']], function () {

    Route::namespace('EspaceClient')->prefix('espace-client')->group(function() {

        Route::get('/','ClientController@index')->name('espace.client');

        Route::resource('projets', 'ProjetsController');

        Route::resource('boutiques', 'BoutiqueController');

        Route::resource('products', 'ProductsController');

        Route::resource('submitProduct', 'SubmitProductController');

        Route::get('/mon-club/{nom}','ClientController@club')->name('mon-club');

        Route::post('/projet/carneva','ClientController@upload_file')->name('carneva.upload');

        Route::get('/projet/carneva/dowload','ClientController@telecharger')->name('carneva.download');

        Route::post('/projet/confirmation','ClientController@confirmation')->name('confirmation');



    });
});


//Espace d'administration

Route::group(['middleware' => ['auth']], function () {

    Route::namespace('EspaceAdmin')->prefix('espace-admin')->group(function() {

        Route::get('/','AdminController@index')->name('espace.admin');

        Route::get('/accounts','AccountsController@index')->name('accounts.index');

        Route::get('/accounts/{nom}','AccountsController@show')->name('accounts.show');

        Route::resource('activations', 'ActivationsController');

        Route::resource('groupes', 'GroupesControler');

        Route::get('/clubs/critere','AdminController@critere')->name('clubs.critere');

        Route::post('/clubs/create','AdminController@create_club')->name('clubs.create');

        Route::namespace('Clubs')->group(function() {

            Route::resource('clubs','ClubsControler');

            Route::resource('projects', 'ProjectController');
        });

        Route::namespace('Clients')->group(function(){

            Route::get('/clients/projets/validation','ValidationController@index')->name('validations.projets');

            Route::get('/clients/projets/validation/detail-projet/{projet}','ValidationController@detail_projet')->name('validations.detail-projet');

        });
    });


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
