@extends('frontend.layouts.component')

@section('content')
    <div class="news">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="text-center alert alert-success">Passer commande</h4>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                    <div class="bg-warning">
                        @include('layouts.messages')
                    </div>

                    <div class="table-responsive shadow-lg">
                        <table class="table table-hover">
                            <thead class="text-white" style="background-color: #003679">
                                <tr>
                                    <th>Image</th>
                                    <th>Produit</th>
                                    <th>Prix unit (XOF) </th>
                                    <th>Quantité</th>
                                    <th>Total (XOF) </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <img src="/storage/produits/{{$item->attributes->image }}" width="120" height="100" alt="">
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{number_format($item->price)}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{ number_format(\Cart::get($item->id)->getPriceSum()) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan="4">Total : {{ number_format(\Cart::getTotal() ) }} FCFA</td>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card shadow-lg " >
                        <div class="card-header text-white" style="background-color: #003679"><h6>Résumé des achats</h6></div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Total Brut: <b class="pull-right">{{ number_format(\Cart::getTotal()) }} XOF</b></li>

                                <li class="list-group-item">TVA: <b class="pull-right">0.15%</b></li>

                                <li class="list-group-item">Total Net : <b class="pull-right"> {{ number_format(\Cart::getTotal() + (\Cart::getTotal()*0.0015) ) }} XOF</b></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-4">
                    <div class="card shadow-lg">
                        <div class="card-header" style="background-color: #003679">
                            <h4 class="text-white">Enregistrer ma commande</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Identité</p>
                                        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingPassword" readonly value="{{$user->name}} {{$user->username}} ">
                                            <label for="floatingPassword">Nom & Prénoms</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingPassword" readonly value="{{$user->email}}">
                                            <label for="floatingPassword">Email</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control"  id="numero_tel" name="numero_tel" placeholder="Entrez votre numéro de téléphone">
                                            <label for="floatingPassword">Numéro de téléphone</label>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <p>Localisation</p>

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
                                            <input type="text" class="form-control" id="ville" name="ville" placeholder="Entrez votre numéro de téléphone">
                                            <label for="ville">Ville</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Veuillez nous décrire un peu votre situation géographique" name="situation_geo" id="situation_geo"></textarea>
                                            <label for="situation_geo">Veuillez nous décrire un peu votre situation géographique</label>
                                        </div>

                                        @foreach ($items as $item)
                                        <div class="form-group">
                                            <input type="text" name="name[]" id="" class="form-control form-control-sm" value=" {{$item->name}} ">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="quantity[]" id="" class="form-control form-control-sm" value=" {{$item->quantity}} ">
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
