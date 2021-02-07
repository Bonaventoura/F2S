@extends('frontend.layouts.component')

@section('content')
    <div class="news">
        <div class="container">
            <div class="row">


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <h2 class="text-center text-dark mb-4" >
                        Résultat de la recherche
                    </h2>
                    <div class="col-lg-12 pull-right">
                        <form action="{{ route('foire.search') }}" method="GET">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Entrez pour rechercher un produit ou une boutique" aria-label="Entrez pour rechercher un produit ou une boutique" aria-describedby="button-addon2">
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
            </div>
        </div>
    </div>
@endsection
