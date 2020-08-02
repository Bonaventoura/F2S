@extends('foire-online.inc')

@section('page')

    <!-- Main Content -->
    <main class="main-content">

        <section class="section bg-secondary">
            <div class="container">
                <div class="text-center">
                    <h1>Bienvenue à Foire Online  </h1>
                    <h3>Espace Boutique {{$boutique->nom_boutique}}</h3>
                    <h3 class="text-center mt-0">Faites un tour dans notre espace Foire Online et visiter nos boutiques</h3>
                    <p class="lead">
                        Chez {{$boutique->nom_boutique}}, Les clients sont des rois,
                    </p>
                </div>

                <div class="row gap-y mt-5">

                    @foreach ($products as $item)
                        <div class="col-md-6 col-xl-3">
                            <div class="product-3 mb-3">
                            <a class="product-media" href="#">
                                <span class="badge badge-pill badge-primary badge-pos-left">New</span>
                                <img src="/storage/produits/{{$item->photo_produit}}"  alt="product">
                            </a>

                            <div class="product-detail bg-gradient-danger text-white">
                                <h5><a href="#">{{$item->nom_produit}}</a></h5>
                                <div class="product-price"> {{$item->prix_unit_vente}}  FCFA </div>
                            </div>
                            </div>
                        </div>
                    @endforeach

                </div>


                <nav class="mt-7">
                    <ul class="pagination justify-content-center">
                        {{$products->links()}}
                    </ul>
                </nav>


            </div>
        </section>

      </main>

@endsection
