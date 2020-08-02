@extends('layouts.app')

@section('content')

    <div class="container py-lg-10">
        <div class="row">
            <div class="col-lg-8">

                <div class="card ">
                    <div class="card-header bg-secondary">Add to cart</div>
                    <div class="card-body">
                        @include('layouts.messages')
                        <form action="{{ route('cart.add') }}" method="post">

                            @csrf

                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" name="id" id="id" value="2" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" class="form-control"> <br>
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" id="price" class="form-control"> <br>
                            </div>
                            <div class="form-group">
                                <label for="">Quantité</label>
                                <input type="number" name="quantite" id="quantite" class="form-control">
                            </div>


                            <button type="submit" class="btn btn-block btn-primary">Add to cart</button>

                            <a href="{{ route('cart') }}" class="btn btn-block btn-primary">Go to cart</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
