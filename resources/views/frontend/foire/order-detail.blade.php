@extends('frontend.layouts.component')

@section('content')
    <div class="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="text-center alert alert-success">DETAIL DE LA COMMANDE DU {{$order->created_at->format('d-m-Y : H:i:s')}} DE {{$order->user->name}} {{$order->user->username}}  </h4>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-white" style="background-color: #003679">
                            <h5>CMD N° {{$order->token}} </h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Total Brut: <b class="pull-right">{{$order->prix_total_cmd}} XOF</b></li>

                                <li class="list-group-item">Total produits: <b class="pull-right">{{$order->total_quantity}} </b></li>

                                <li class="list-group-item">
                                    Etat CMD :
                                    <b class="pull-right">
                                        @if ($order->status == 0 )
                                        <span class="badge alert-warning">Non payé</span>
                                        @else
                                        <span class="badge alert-success">Déjà payé</span>
                                        @endif
                                    </b>
                                </li>
                                <li class="list-group-item">
                                    Etat Livraison :
                                    <b class="pull-right">
                                        @if ($livraison->status == 0 )
                                        <span class="badge alert-warning">Non Livré</span>
                                        @else
                                        <span class="badge alert-success">Déjà Livré</span>
                                        @endif
                                    </b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5 mb-5">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Produits</a>
                              <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Livraison</a>
                              <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Paiement</a>
                            </div>
                        </nav>
                        <div class="tab-content my-4" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                <div class="row">
                                    @foreach ($order_products as $prod)
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="card shadow-lg text-center" style="width: 12rem;">
                                            <img src="/storage/produits/{{$prod->product->photo_produit}}" class="card-img-top" alt="...">
                                            <div class="card-body text-white" style="background-color: #003679">
                                                <h6>{{str_limit($prod->product->nom_produit,15)}} </h6>
                                                <a  class="btn btn-xs btn-danger">Qte : {{$prod->quantity}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <div class="row">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="pays" name="pays" aria-label="Floating label select example">
                                            <option value="TOGO">TOGO</option>
                                            <option value="BENIN">BENIN</option>
                                            <option value="CÔTE-D'IVOIRE">CÔTE-D'IVOIRE</option>
                                            <option value="GHANA">GHANA</option>
                                            <option value="BURKINA-FASO">BURKINA-FASO</option>
                                            <option value="NIGER">NIGER</option>
                                        </select>
                                        <label for="pays">Choisir le pays de destination </label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword"  value="{{$livraison->ville}}">
                                        <label for="floatingPassword">Ville de livraison</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword"  value="{{$livraison->quartier}}">
                                        <label for="floatingPassword">Quartier de la livraison</label>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade mt-4 mb-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                @if ($order->status == 0 )

                                    <form action="">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="mode_paiement" name="mode_paiement" aria-label="Floating label select example">
                                                <option value="FLOOZ">FLOOZ</option>
                                                <option value="TMONEY">TMONEY</option>
                                                <option value="CARTE BANCAIRE">CARTE BANCAIRE</option>

                                            </select>
                                            <label for="mode_paiement">Choisir un moyen de Paiement de la commande </label>
                                        </div>
                                    </form>

                                @else
                                    <h4><span class="badge alert-success">Déjà payé</span></h4>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
