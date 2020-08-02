@extends('layouts.frontend')

@section('page')

    <!-- Main Content -->
    <main class="main-content">

        <section class="section bg-secondary">
            <div class="container">
                <div class="text-center">
                    <h1>Bienvenue à Online Foire</h1>
                    <marquee behavior="" direction="">
                        <h3 class="text-center mt-0">Faites un tour dans notre espace Foire Online et visiter nos boutiques</h3>
                    </marquee>
                    <p class="lead">
                        Chez StarLab, Les clients sont des rois,
                    </p>
                </div>

                <div class="row gap-y mt-5">

                    @foreach ($boutiques as $item)
                        <div class="col-md-6 col-xl-4">
                            <div class="product-3 mb-3">
                            <a class="product-media" href="{{ route('foire.show', ['id'=>$item->id]) }}">
                                <span class="badge badge-pill badge-primary badge-pos-left">New</span>
                                <img src="/storage/avatars/{{$item->avatar}}"  alt="product">
                            </a>

                            <div class="product-detail">
                                <h6><a href="#">{{$item->nom_boutique}}</a></h6>
                                <div class="product-price"> {{$item->domaine_activite}} </div>
                            </div>
                            </div>
                        </div>

                    @endforeach

                </div>


                <nav class="mt-7">
                    <ul class="pagination justify-content-center">
                        {{$boutiques->links()}}
                    </ul>
                </nav>


            </div>
        </section>

      </main>

@endsection
