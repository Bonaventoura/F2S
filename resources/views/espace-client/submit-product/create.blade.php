@extends('espace-client.include')

@section('content')

    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Back Office | Articles | Demande de Soumission de Produit</h1>
            </div>

            <!-- Content Row -->



            <!-- Content Row -->

            <div class="row">

            <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                            <h6 class="m-0 font-weight-bold text-primary">Soumettre mon article</h6>

                        </div>
                    <!-- Card Body -->
                        <div class="card-body">

                            @include('layouts.messages')

                            <form action="{{ route('submitProduct.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row" style="align-content: center">

                                        <div class="col-lg-12 col-xl-12">

                                            <div class="card mb-4">

                                                <div class="card-header bg-gradient-primary text-white"><h4 class="text-center">Informations du Produits à Soumettre</h4></div>

                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <input type="hidden" name="boutique_id" id="boutique_id" value=" {{$boutique_id}} ">
                                                        <strong><label for="nom_produit">Nom du Produit</label></strong>

                                                        <select name="product_id" id="product_id" class="form-control form-control-sm">
                                                            @foreach ($products as $item)
                                                                <option value="{{$item->id}}">{{$item->nom_produit}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>


                                                    <div class="form-group">
                                                        <strong><label for="quantite_stock">Quantité stock du produit</label></strong>
                                                        <input type="number" name="quantite_stock" id="quantite_stock" @error('quantite_stock') is-invalid @enderror" value="{{old('quantite_stock')}}" class="form-control form-control-sm" >

                                                        @error('quantite_stock')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="form-group">
                                                        <strong><label for="description">Description du produit </label></strong>
                                                    <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>

                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group ">
                                                        <button type="submit" class="btn btn-block btn-primary" name="submit" ><span class="fa fa-send"></span> Envoyer</button>
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
