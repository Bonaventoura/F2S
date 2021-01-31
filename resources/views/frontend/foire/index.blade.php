@extends('frontend.layouts.include')

@section('img-src')
images/news_background.jpg
@endsection

@section('page')
    Foire Online
@endsection

@section('route')
    <a href="{{ route('foire.online') }}">Foire</a>
@endsection

@section('content')
<div class="news">
    <div class="container " style="background-color: #ede8da">
        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mt-4">
                <h2><marquee behavior="" direction="">BIENVENUE A FOIRE ONLINE</marquee></h2>
                <div class="col-lg-6 pull-right">
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Entrez pour rechercher une boutique" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>


            @foreach ($boutiques as $market)
            <!-- News Post -->
            <div class="col-lg-4  ">
                <div class="news_post">
                    <div class="news_image ">
                        <img src="/storage/avatars/{{$market->avatar}}" width="370"  alt="">
                    </div>

                    <div class="news_content " style="background-color: #003679">
                        <div class="news_title text-white"> {{$market->nom_boutique}} </div>
                        <div class="news_text mt-2">
                            <p class="text-white">Domaine : Commerce</p>
                        </div>
                        <a href="{{ route('foire.show',['boutique'=>$market->nom_boutique]) }}" class="btn btn-xs btn-danger">Visitez la boutique</a>
                    </div>

                </div>
            </div>
            @endforeach

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
