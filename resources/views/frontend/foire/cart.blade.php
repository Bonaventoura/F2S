@extends('frontend.layouts.include')

@section('img-src')
    {{ asset('images/news_background.jpg') }}
@endsection

@section('page')
    MON PANIER
@endsection

@section('route')
    <a href="{{ route('foire.online') }}">Foire</a>
@endsection

@section('content')

    <div class="news">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="text-dark text-center">Mon panier</h2>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="text-dark">
                        @if(\Cart::getTotalQuantity()>0)
                            <h4>{{ \Cart::getTotalQuantity()}} Produit(s) </h4><br>
                        @else
                            <h4>Aucun produit disponible dans votre panier </h4><br>
                            <a href="{{ route('foire.online') }}" class="btn btn-dark">Continuer le Shopping</a>
                        @endif
                    </div>
                    <div class="bg-warning">
                        @include('layouts.messages')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-white" style="background-color: #003679">
                                <tr>
                                    <th>Image</th>
                                    <th>Produit</th>
                                    <th>Prix unit (XOF) </th>
                                    <th>Quantité</th>
                                    <th>Total (XOF) </th>
                                    <th >Edit</th>
                                    <th>Del</th>
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
                                    <td>
                                        <form action="{{ route('cart.update') }}" method="POST" >
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col ">
                                                    <input type="number" class="form-control form-control-sm" value="1" min="1" id="quantity" name="quantity" style="width: 70px;">
                                                </div>
                                                <div class="col ">
                                                    <button class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></button>
                                                </div>

                                            </div>
                                            <input type="hidden" value=" {{$item->id}} " id="id" name="id">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value=" {{$item->id}} " id="id" name="id">
                                            <button class="btn btn-danger btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 pull-right">
                        @if(count($items)>0)
                            <form action="{{ route('cart.clear') }}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-md">Vider mon panier</button>
                            </form>
                        @endif
                    </div>

                </div>

            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 mt-4 " >
                <div class="card shadow-lg " style="background-color: #003679">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Sub Total: <b class="pull-right">{{ number_format(\Cart::getTotal()) }} XOF</b></li>
                        <hr>
                        <li class="list-group-item">TVA: <b class="pull-right">15%</b></li>
                        <hr>
                        <li class="list-group-item">Total : <b class="pull-right"> {{ number_format(\Cart::getTotal() + (\Cart::getTotal()*0.15) ) }} XOF</b></li>
                    </ul>
                </div>
                <br><a href="Javascript:history.back()" class="btn btn-dark">Continuer le Shopping</a>
                @if (count($items)>0)
                <a href="{{ route('foire.checkout') }}" class="btn btn-success">Passer la commande</a>
                @endif
            </div>
        </div>
    </div>
@endsection
