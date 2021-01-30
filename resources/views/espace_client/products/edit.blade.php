@extends('espace_client.include.frontend')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-olive">
                        <h4>Modifier l'article {{$product->nom_produit}} </h4>
                    </div>
                    <div class="card-body bg-navy">
                        <form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @include('layouts.messages')
                                <div class="col-lg-6">
                                    <input type="hidden" name="boutique_id" id="boutique_id" value="{{$boutique_id}}">
                                    <div class="form-group">
                                        <label for="nom_produit">Désignation du produit</label>
                                        <input type="text" id="nom_produit" name="nom_produit" value=" {{$product->nom_produit}} " placeholder="Entrez la désignation du produit" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Catégorie de produit</label>
                                        <select name="category_id" id="category_id" class="form-control form-control-sm">
                                            <option value="">Choisir la catégorie du produit</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}"
                                                @if ($product->category_id == $category->id)
                                                    selected
                                                @endif
                                            >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo_produit">Image du produit</label>
                                        <input type="file" name="photo_produit" id="photo_produit" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="qtte_stock">La quantité de Stock initial</label>
                                        <input type="text" name="qtte_stock" id="qtte_stock" value=" {{$product->qtte_stock}} " placeholder="la quantité de stock initiale du produit" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="prix_vente_gros">Prix de vente en gros</label>
                                        <input type="text" name="prix_unit_gros" id="prix_unit_gros" value=" {{$product->prix_unit_gros}} " placeholder="le prix unitaire de vente en gros" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="prix_unit_vente">Le prix unitaire de vente</label>
                                        <input type="text" name="prix_unit_vente" id="prix_unit_vente" value=" {{$product->prix_unit_vente}} " placeholder="le prix unitaire de vente en détail" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fa fa-edit"></i>Appliquer les modifications
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-olive">
                        <a href="{{ route('boutiques.index') }}" class="btn btn-sm btn-warning">Retournez</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
