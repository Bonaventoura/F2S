@extends('e-commerce.frontend')

@section('page')

    {{--
    <div class="container py-lg-10">

        <div class="col-lg-4">
            <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
                @else
                    <h4>No Product(s) In Your Cart</h4><br>
                    <a href="/form" class="btn btn-dark">Continue Shopping</a>
                @endif
        </div>

        <div class="col-lg-8 center-block">
            <div class="row">
                @foreach ($items as $item)

                    <div class="col-lg-5">
                        <p>
                            <b>{{ $item->name }}</b><br>
                            <b>Price: </b>${{ $item->price }}<br>
                            <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>

                        </p>
                    </div>

                    <div class="col-lg-4">
                        <div class="row">
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                    <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                           id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                    <button class="btn btn-primary btn-sm" style="margin-right: 25px;"><i class="fa fa-edit"></i></button>
                                </div>
                            </form>
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <button class="btn btn-danger btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>

                @endforeach

                @if(count($items)>0)
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Clear Cart</button>
                    </form>
                @endif
            </div>

            @if(count($items)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                        </ul>
                    </div>

                </div>
            @endif

        </div>
    </div>
    --}}

    <!-- Main Content -->
    <main class="main-content">

        <section class="section">

            <div class="container">
                <h2 class="text-center text-decoration-none text-gray-700">Mon panier</h2>
                <form class="row gap-y">

                    <div class="col-lg-8">

                        <table class="table table-cart">

                            <tbody valign="middle">

                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <a class="item-remove" href="#"><i class="ti-close"></i></a>
                                        </td>

                                        <td>
                                            <a href="item.html">
                                            <img class="rounded" src="/storage/produits/{{$item->attributes->image}}" alt="...">
                                            </a>
                                        </td>

                                        <td>
                                            <h5>{{$item->name}}</h5>
                                            <p>White and wireless</p>
                                        </td>



                                        <td>
                                            <h4 class="price"> {{ \Cart::get($item->id)->getPriceSum() }} FCFA</h4>
                                        </td>

                                        <td>
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                                            <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}" id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                                            <button class="btn btn-primary btn-sm" style="margin-right: 25px;"><i class="fa fa-edit"></i></button>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="form-group">
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                                        <button class="btn btn-danger btn-sm" style="margin-right: 10px;" ><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>


                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>

                    </div>


                    <div class="col-lg-4">
                        <div class="cart-price">
                            <div class="flexbox">
                                <div>
                                    <p><strong>Total produits:</strong></p>
                                </div>

                                <div>
                                    @if(\Cart::getTotalQuantity()>0)
                                        {{ \Cart::getTotalQuantity()}} Product(s) In Your Cart<br>
                                    @else
                                        <h4>No Product(s) In Your Cart</h4><br>
                                        <a href="/shopping" class="btn btn-dark">Continue Shopping</a>
                                    @endif
                                </div>
                            </div>
                            <hr>

                            <div class="flexbox">
                                <div>

                                    <p><strong>Shipping:</strong></p>
                                    <p><strong>Tax (%10):</strong></p>
                                </div>

                                <div>

                                    <p>$39</p>
                                    <p>$68</p>
                                </div>
                            </div>

                        <hr>

                            <div class="flexbox">
                                <div>
                                    <p><strong>Total:</strong></p>
                                </div>

                                <div>
                                    <p class="fw-600">{{ \Cart::getTotal() }} FCFA</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-block btn-secondary" href="{{ route('shopping') }}">Shop more</a>
                            </div>

                            <div class="col-6">
                                <a href="{{route('cart.checkout')}}" class="btn btn-block btn-primary" >Checkout<i class="ti-angle-right fs-9"></i></a>
                            </div>

                        </div>

                    </div>

                </form>
            </div>
        </section>

    </main>

@endsection
