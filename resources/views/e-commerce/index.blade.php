@extends('e-commerce.frontend')

@section('page')

    <section class="section p-0">
        <div class="slider-arrows-flash-light slider-dots-inside slider-dots-fill-primary" data-provide="slider" data-autoplay="true" data-arrows="true" data-dots="true">
            <div class="bg-img h-600" style="background-image: url(../assets/img/thumb/12.jpg)"></div>
            <div class="bg-img h-600" style="background-image: url(../assets/img/thumb/11.jpg)"></div>
            <div class="bg-img h-600" style="background-image: url(../assets/img/thumb/10.jpg)"></div>
            <div class="bg-img h-600" style="background-image: url(../assets/img/thumb/9.jpg)"></div>
        </div>
    </section>
    <!-- Main Content -->
    <main class="main-content">
        <section class="section bg-gray">
            <div class="container">
                @include('layouts.messages')

                <div class="mb-8 d-flex">
                    <a href="{{ route('cart') }}" class="btn btn-primary k" class="tooltip-test" title="add to cart">
                        <i class="fa fa-shopping-cart"></i> Aller au panier
                    </a>

                </div>

                <div class="row gap-y">

                    @foreach ($products as $item)
                        <div class="col-md-6 col-xl-3">
                            <div class="product-3 mb-3">
                                <a class="product-media" href="#">
                                    <span class="badge badge-pill badge-primary badge-pos-left">New</span>
                                    <img src="/storage/produits/{{$item->photo_produit}}"  alt="product">
                                </a>

                                <div class="product-detail bg-dark text-white">
                                    <h5><a href="#">{{$item->nom_produit}}</a></h5>
                                    <div class="product-price"> {{$item->prix_unit_vente}}  FCFA </div>
                                </div>

                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $item->nom_produit }}" id="name" name="name">
                                        <input type="hidden" value="{{ $item->prix_unit_vente }}" id="price" name="price">
                                        <input type="hidden" value="{{ $item->photo_produit }}" id="img" name="img">
                                        <input type="hidden" value="1" id="quantity" name="quantity">

                                        <button class="btn btn-primary btn-block" class="tooltip-test" title="add to cart">
                                            <i class="fa fa-shopping-cart"></i> Ajouter au panier
                                        </button>
                                </form>

                            </div>

                        </div>
                    @endforeach
                </div>



                <nav class="mt-7 pagination justify-content-center">
                     {{$products->links()}}
                </nav>

            </div>
        </section>
    </main>
<!--End Main Content -->

@endsection
