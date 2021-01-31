@extends('frontend.layouts.include')

@section('img-src')
    {{ asset('images/news_background.jpg') }}
@endsection

@section('page')
    BOUTIQUE {{$market->nom_boutique}}
@endsection

@section('route')
    <a href="{{ route('foire.online') }}">Foire</a>
@endsection

@section('content')
    <div class="news">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <h2 class="text-center text-dark mb-4" >
                        Découvrez en détail les articles de la boutique {{$market->nom_boutique}}
                    </h2>
                    <div class="col-lg-6 pull-right">
                        <form action="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholders="Entrez pour rechercher une boutique" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        @include('layouts.messages')
                        {{-- liste des produits  --}}
                        @foreach ($products as $product)
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <img src="/storage/produits/{{$product->photo_produit}}" height="205" class="card-img-top" alt="...">
                                <div class="card-body" style="background-color: #003679">
                                    <h5 class="card-title text-white">{{$product->nom_produit}}</h5>
                                    <p class="card-text text-white">Prix : {{$product->prix_unit_vente}} FCFA</p>

                                    <form action="{{ route('cart.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" readonly value="{{ $product->id }}" id="id" name="id">
                                        <input type="hidden" readonly value="{{ $product->nom_produit }}" id="name" name="name">
                                        <input type="hidden" readonly value="{{ $product->prix_unit_vente }}" id="price" name="price">
                                        <input type="hidden" readonly value="{{ $product->photo_produit }}" id="img" name="img">
                                        <input type="hidden" readonly value="1" id="quantity" name="quantity">

                                        <button class="btn btn-primary btn-block" class="tooltip-test" title="Ajouter au panier">
                                            <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                        </button>
                                    </form>


                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5 mb-5">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Gérant</a>
                          <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Market</a>
                          <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Autre boutiques</a>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4 mt-4 mb-4">
                                            <div class="card shadow-lg text-center" style="width: 12rem;">
                                                <img src="/storage/profil/{{$account->photo_profil}}" class="card-img-top" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" readonly value="{{$account->nom}}">
                                        <label for="floatingInput">Nom du Gérant</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$account->prenoms}}">
                                        <label for="floatingPassword">Prénoms</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$account->num_tel}}">
                                        <label for="floatingPassword">Numero de téléphone</label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" readonly value="{{$account->pays}}">
                                        <label for="floatingInput">Pays</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$account->ville}}">
                                        <label for="floatingPassword">Ville</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$account->email}}">
                                        <label for="floatingPassword">Email</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            <div class="row">
                                <div class="col-lg-12 mt-3 mb-4">
                                    <div class="card shadow-lg text-center" style="width: 12rem;">
                                        <img src="/storage/avatars/{{$market->avatar}}" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" readonly value="{{$market->nom_boutique}}">
                                        <label for="floatingInput">Nom de la boutiqe</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$market->contact_boutique}}">
                                        <label for="floatingPassword">Numero de la boutique</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$market->email_boutique}}">
                                        <label for="floatingPassword">Email de la boutique</label>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$market->pays}}">
                                        <label for="floatingPassword">Pays</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$market->ville}}">
                                        <label for="floatingPassword">Ville</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" readonly value="{{$market->quartier}}">
                                        <label for="floatingPassword">Quartier</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-4 mb-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                            @foreach ($boutiques as $market)
                            <div class="card shadow-lg text-center" style="width: 12rem;">
                                <img src="/storage/avatars/{{$market->avatar}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a href="{{ route('foire.show',['boutique'=>$market->nom_boutique]) }}" class="btn btn-xs btn-danger">Visitez la boutique</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>


@endsection
