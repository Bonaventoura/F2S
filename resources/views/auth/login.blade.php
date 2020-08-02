@extends('frontend.layouts.frontend')

@section('slider_home')
    <div class="home_slider_container">

        <!-- Home Slider -->

        <div class="owl-carousel owl-theme home_slider mb-2">

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url({{asset('images/about.jpg')}})"></div>
                <div class="home_slider_content text-center">
                    <h1>ESPACE DE CONNEXION</h1>
                    <div class="home_slider_text">

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('main')
    <div class="col-md-12 bg-secondary">

        <div class="container text-white">

            @include('layouts.messages')
            <h2 class="text-center">Connectez-vous</h2>
            <div class="row">

                <form class="col-11 col-md-6 col-xl-5 mx-auto section-dialog bg-gray p-5 p-md-7" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{old('username')}}">
                    </div>

                    <div class="form-group input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key fa-fw"></i></span>
                        </div>
                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                    </div>

                    <button class="btn btn-block btn-lg btn-success">
                        <img src="{{ asset('images/next.png') }}" width="100" alt="">
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                            Mot de passe oublié
                        </a>
                    @endif
                    <a class="btn btn-link text-white" href="{{ route('compte.create') }}">
                        S'inscrire
                    </a>
                </form>

            </div>
        </div>
    </div>

@endsection
