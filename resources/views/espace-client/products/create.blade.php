@extends('espace-client.include')

@section('content')

    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Back Office | Articles</h1>
            </div>

            <!-- Content Row -->



            <!-- Content Row -->

            <div class="row">

            <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                            <h6 class="m-0 font-weight-bold text-primary">Charger mon article</h6>

                        </div>
                    <!-- Card Body -->
                        <div class="card-body">

                            @include('layouts.messages')

                            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row" style="align-content: center">

                                        <div class="col-lg-12 col-xl-12">


                                            <div class="card mb-4">

                                                <div class="card-header bg-gradient-primary text-white"><h4 class="text-center">Informations du Produits a Charger</h4></div>

                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <input type="hidden" name="boutique_id" id="boutique_id" value=" {{$boutique_id}} ">
                                                        <strong><label for="nom_produit">Nom du Produit</label></strong>
                                                    <input type="text" name="nom_produit" id="nom_produit" @error('nom_produit') is-invalid @enderror value="{{old('nom_produit')}}" class="form-control form-control-sm">

                                                        @error('nom_produit')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <strong><label for="domaine_usage">Domaine d'usage du Produit</label></strong>
                                                        <input type="text" name="domaine_usage" id="domaine_usage" @error('domaine_usage') is-invalid @enderror" value="{{old('domaine_usage')}}" class="form-control form-control-sm">

                                                        @error('domaine_usage')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <strong><label for="prix_unit_gros">Prix Unitaire de gros du Produit</label></strong>
                                                        <input type="number" name="prix_unit_gros" id="prix_unit_gros" @error('prix_unit_gros') is-invalid @enderror" value="{{old('prix_unit_gros')}}" class="form-control form-control-sm" >

                                                        @error('prix_unit_gros')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <strong><label for="prix_unit_vente">Prix Unitaire de vente du Produit</label></strong>
                                                        <input type="number" name="prix_unit_vente" id="prix_unit_vente" @error('prix_unit_vente') is-invalid @enderror" value="{{old('prix_unit_vente')}}" class="form-control form-control-sm" >

                                                        @error('prix_unit_vente')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <strong><label for="photo_produit">Charger la photo du produit </label></strong>
                                                        <input type="file" name="photo_produit" id="photo_produit" @error('photo_produit') is-invalid @enderror" class="form-control form-control-file">

                                                        @error('photo_produit')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group ">
                                                        <button type="submit" class="btn btn-primary" name="submit" >Valider</button>
                                                    </div>

                                                </div>
                                            </div>

                                            <a href="{{ route('boutiques.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-backspace fa-sm text-white-50"></i>Retour</a>

                                        </div>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    <!-- /.container-fluid -->

@endsection
