@extends('frontend.layouts.component')

@section('page')
    CREATION DE COMPTE
@endsection

@section('route')
    <a href="{{ route('compte.create') }}">Compte</a>
@endsection

@section('content')

    <div class="news">
        <div class="container ">
			<div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-4">
                    <div class="card shadow-lg">
                        <div class="card-header text-center text-white" style="background-color: #003679">
                            <h4>CREATION DE COMPTE CHEZ F2S</h4>
                            <small>Choix du type de compte à créer</small>
                        </div>
                        <div class="card-body">
                            <div class="row text-white">
                                <div class="col-lg-6 text-center">
                                    <button id="btn_compte_f2s" class="btn btn-block btn-primary">
                                        COMPTE START-UP
                                    </button>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <button id="btn_compte_foire" class="btn btn-block btn-danger">
                                        COMPTE E-SHOP
                                    </button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-2 bg-navy">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                COMPTE START-UP F2S
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="alert alert-success  fade show text-center" role="alert">
                                                        <strong>Bienvenue à F2S !!!</strong> Créez un compte start-up pour être un client de F2S et profiter d'autres services
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    COMPTE E-SHOP F2S
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="alert alert-success fade show text-center" role="alert">
                                                        <strong>Bienvenue à E-SHOP !!! </strong> Créez un compte e-shop pour vous faciliter les achats dans l'espace foire de F2S
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card shadow-lg">
                        <div class="card-header text-white text-center" style="background-color: #003679">
                            <h4 id="compte">CREATION DE NOUVEAU COMPTE START-UP F2S</h4>
                        </div>
                        <div class="card-body">
                            @include('layouts.messages')

                            <div id="form_compte_f2s">

                                <form action="{{ route('compte.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input class="form-control form-control-sm" name="nom" type="text" placeholder="Votre nom de famille" value="{{old('nom')}}">
                                                <span class="text-danger" id="error_nom"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Prénoms</label>
                                                <input class="form-control form-control-sm" name="prenoms" id="prenoms" type="text" placeholder="Votre prénoms" value=" {{old('prenoms')}} ">
                                                <span class="text-danger" id="error_prenoms"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control form-control-sm" name="email" id="email" value=" {{old('email')}} " type="email" placeholder="Votre adresse e-mail">
                                                <span class="text-danger" id="error_email"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Pseudo</label>
                                                <input class="form-control form-control-sm" name="pseudo" id="pseudo" value=" {{old('pseudo')}}" type="text" placeholder="Votre pseudo">
                                                <span class="text-danger" id="error_pseudo"></span>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            @if (isset($pseudo_parrain))
                                                <div class="form-group">
                                                    <label>Pseudo de votre parrain</label>
                                                    <input class="form-control form-control-sm" value=" {{$pseudo_parrain}} " name="pseudo_parrain" type="text" placeholder="Pseudo de votre parrain" readonly>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <label>Pseudo de votre parrain</label>
                                                    <input class="form-control form-control-sm" id="pseudo_parrain" name="pseudo_parrain" type="text" placeholder="Pseudo de votre parrain">
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label>Numéro de téléphone</label>
                                                <input class="form-control form-control-sm" name="num_tel" id="num_tel" type="text" placeholder="Entrez votre mot de passe">
                                                <span class="text-danger" id="error_num_tel"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control form-control-sm" name="password" id="password" type="password" placeholder="Entrez votre mot de passe">
                                                <span class="text-danger" id="error_password"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Confirmation du mot de passe</label>
                                                <input class="form-control form-control-sm" name="password_conf" id="password_conf"  " type="password" placeholder="Veuillez confirmez votre mot de passe">
                                                <span class="text-danger" id="error_password_conf"></span>
                                            </div>

                                            <div class="form-group ">
                                                <button type="submit" class="btn btn-lg btn-primary" > <span class="fa fa-save"></span>S'inscrire </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="form_compte_shop" style="display: none">

                                <form action="{{ route('foire.register') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input class="form-control form-control-sm" name="nom" id="nom" type="text" placeholder="Votre nom de famille" value="{{old('nom')}}">
                                                <span class="text-danger" id="error_nom"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Prénoms</label>
                                                <input class="form-control form-control-sm" name="prenoms" type="text" placeholder="Votre nom de famille" value="{{old('nom')}}">
                                                <span class="text-danger" id="error_prenoms"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Pseudo</label>
                                                <input class="form-control form-control-sm" name="pseudo" id="pseudo" value=" {{old('pseudo')}}" type="text" placeholder="Votre pseudo">
                                                <span class="text-danger" id="error_pseudo"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control form-control-sm" name="email" id="email" value=" {{old('email')}} " type="email" placeholder="Votre adresse e-mail">
                                                <span class="text-danger" id="error_email"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control form-control-sm" name="password" id="password" type="password" placeholder="Entrez votre mot de passe">
                                                <span class="text-danger" id="error_password"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Confirmation du mot de passe</label>
                                                <input class="form-control form-control-sm" name="password_conf" id="password_conf"  " type="password" placeholder="Veuillez confirmez votre mot de passe">
                                                <span class="text-danger" id="error_password_conf"></span>
                                            </div>

                                            <div class="form-group ">
                                                <button type="submit" class="btn btn-lg btn-primary" > <span class="fa fa-save"></span>S'inscrire </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="card-footer" style="background-color: #003679">
                            <marquee behavior="" direction="">

                                <h4 class="text-white">
                                    <img src="{{ asset('images/logo_f2s.png') }}" width="100" alt="">
                                    Avec F2S, devenez un client en quelques minutes, nous vous souhaitons la bienvenue.
                                    <img src="{{ asset('images/logo_f2s.png') }}" width="100" alt="">
                                </h4>
                            </marquee>
                        </div>
                    </div>
                </div>
			</div>
		</div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            var error_nom = false;
            var error_prenoms = false;
            var error_email = false;
            var error_pseudo = false;
            var error_num_tel = false;

            $('#btn_compte_foire').click(function (e) {
                e.preventDefault();
                $('#form_compte_shop').show();
                $('#form_compte_f2s').hide();
                $('#compte').html("CREATION DE NOUVEAU COMPTE E-SHOP");
            });

            $('#btn_compte_f2s').click(function (e) {
                e.preventDefault();
                $('#form_compte_shop').hide();
                $('#form_compte_f2s').show();
                $('#compte').html("CREATION DE NOUVEAU COMPTE START-UP F2S");
            });

        });

    </script>

@endsection
