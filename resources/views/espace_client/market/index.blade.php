@extends('espace_client.include.frontend')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-olive">
                        <h4>{{$market->nom_boutique}} MARKET</h4>
                    </div>
                    <div class="card-body bg-navy">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="/storage/avatars/{{$market->avatar}}" width="320" alt="">
                            </div>
                            <div class="col-lg-8">
                                <h4>Information de la boutique</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Market: {{$market->nom_boutique}} </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pays: {{$market->pays}} </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ville: {{$market->ville}} </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Quartier: {{$market->quartier}} </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Email: {{$market->email_boutique}} </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tel: {{$market->contact_boutique}} </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date de création: {{$market->created_at->format('d / m /Y : H:i')}} </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Propriétaire: {{$market->account->nom}} {{$market->account->prenoms}} </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow">
                    <div class="card-header bg-olive">
                        <h4>Mes articles</h4>

                    </div>
                    <div class="card-body bg-navy">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Img </th>
                                        <th>Désignation</th>
                                        <th >Qtte Stock</th>
                                        <th >Prix Unit (FCFA) </th>
                                        <th>Action</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr class="text-white">
                                            <td>
                                                <img src="/storage/produits/{{$product->photo_produit}}" width="90" alt="">
                                            </td>
                                            <td>{{$product->nom_produit}}</td>
                                            <td>{{$product->qtte_stock}}</td>
                                            <td>{{$product->prix_unit_vente}}</td>
                                            <td>
                                                <a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('products.destroy', ['id'=>$product->id]) }}" method="post" class="form-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-olive">
                        <div class="pull-right">
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary ">Ajouter article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
