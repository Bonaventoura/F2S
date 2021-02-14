@extends('frontend.layouts.component')

@section('content')
<div class="news">
    <div class="container " style="background-color: #ede8da">
        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-4">
                <h2><marquee behavior="" direction="">BIENVENUE A FOIRE ONLINE</marquee></h2>
                <div class="col-lg-12 pull-center">
                    {{--<form action="{{ route('foire.search') }}" method="GET">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Entrez pour rechercher un produit ou une boutique" aria-label="Entrez pour rechercher un produit ou une boutique" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                    </form>--}}
                </div>
                @isset($data)
                <div class="alert alert-success  text-center">
                    <h4>{{$data['result']}} Résultat(s) </h4>
                </div>
                @endisset
                @include('layouts.messages')
            </div>

            <div class="col-lg-4 col-md-4" >

                <div class="card shadow-lg">
                    <div class="card-header">
                        <div>
                            <form action="{{ route('foire.search') }}" method="GET">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher un produit ou une boutique" aria-label="Entrez pour rechercher un produit ou une boutique" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <hr>
                        <h4>Nos catégories de produits</h4>
                        <div>
                            <div class="list-group bg-dark">
                                @foreach ($categories as $category)
                                <a href="{{ route('foire.category', ['name'=>$category->name]) }}" class="list-group-item list-group-item-action " aria-current="true">
                                    {{$category->name}} ({{$category->products()->count()}})
                                </a>
                                @endforeach
                              </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-8">

                <div class="row">
                    @foreach ($boutiques as $market)
                    <!-- News Post -->
                    <div class="col-lg-4  ">
                        <div class="news_post shadow-lg">
                            <div class="news_image ">
                                <img src="/storage/avatars/{{$market->avatar}}" width="370"  alt="">
                            </div>

                            <div class="news_content " style="background-color: #003679">
                                <div class="news_title text-white"> {{str_limit($market->nom_boutique,10)}} </div>
                                <div class="news_text mt-2">
                                    <p class="text-white">Domaine : Commerce</p>
                                </div>
                                <a href="{{ route('foire.show',['boutique'=>$market->nom_boutique]) }}" class="btn btn-xs btn-danger">Visitez la boutique</a>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>


            </div>


        </div>

        <div class="row">
            <div class="col">
                <div class="page_nums">
                    {{$boutiques->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
