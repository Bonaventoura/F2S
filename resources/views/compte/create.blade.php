@extends('frontend.layouts.frontend')

@section('slider_home')
    <div class="home_slider_container">

        <!-- Home Slider -->

        <div class="owl-carousel owl-theme home_slider mb-2">

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url({{asset('images/about.jpg')}})"></div>
                <div class="home_slider_content text-center">
                    <h1>CREATION DE COMPTE</h1>
                    <div class="home_slider_text">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('main')

    <!-- Converter -->

	<div class="converter bg-secondary">

		<div class="container ">
			<div class="row">
				<div class="col-lg-12 activer">
                    <form action="{{ route('compte.store') }}" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="card col-lg-12">

                                <div class="card-header text-center">
                                    ESPACE DE CREATION DE COMPTE
                                </div>

                                <div class="card-body">
                                    @include('layouts.messages')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Informations personnelles</h5><br>

                                            <div class="form-group">
                                            <label>Nom</label>
                                            <input class="form-control form-control-sm" name="nom" type="text" placeholder="Votre nom de famille" value="{{old('nom')}}">
                                            </div>

                                            <div class="form-group">
                                                <label>Prénoms</label>
                                                <input class="form-control form-control-sm" name="prenoms" type="text" placeholder="Votre prénoms" value=" {{old('prenoms')}} ">
                                            </div>

                                            <div class="form-group">
                                            <label>Date de naissance</label>
                                            <input class="form-control form-control-sm" name="date_n" type="date" value=" {{old('date_n')}} " >
                                            </div>

                                            <div class="form-group">
                                                <label>Pays</label>
                                                <select class="form-control form-control-sm" name="pays">
                                                    <option value="togo">Togo</option>
                                                    <option value="benin">Benin</option>
                                                    <option value="ghana">Ghana</option>
                                                    <option value="cote-d'ivoire">Côte d'Ivoire</option>
                                                    <option value="burkina-faso">Burkina Faso</option>
                                                    <option value="mali">Mali</option>
                                                    <option value="gabon">Gabon</option>
                                                    <option value="congo">Congo</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Ville</label>
                                                <input class="form-control form-control-sm" name="ville" type="text" placeholder="Saisir la ville " value=" {{old('prenoms')}} ">
                                            </div>


                                            <div class="form-group">
                                                <label>Sexe</label>
                                                <select class="form-control form-control-sm" name="sexe">
                                                    <option value="masculin">Masculin</option>
                                                    <option value="feminin">Feminin</option>
                                                </select>
                                            </div>


                                        </div>

                                        <div class="col-md-6">

                                            <u><h5>Informations de comptes</h5><br></u>


                                            @if (isset($pseudo_parrain))
                                                <div class="form-group">
                                                    <label>Pseudo de votre parrain</label>
                                                    <input class="form-control form-control-sm" value=" {{$pseudo_parrain}} " name="pseudo_parrain" type="text" placeholder="Pseudo de votre parrain" readonly>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <label>Pseudo de votre parrain</label>
                                                    <input class="form-control form-control-sm" value=" {{old('pseudo_parrain')}} " name="pseudo_parrain" type="text" placeholder="Pseudo de votre parrain">
                                                </div>
                                            @endif


                                            <div class="form-group">
                                                <label>Numéro de Contact</label>
                                                <input class="form-control form-control-sm" name="num_tel" value=" {{old('num_tel')}} " type="number" placeholder="Votre numéro de contact">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control form-control-sm" name="email" value=" {{old('email')}} " type="text" placeholder="Votre adresse e-mail">
                                            </div>

                                            <div class="form-group">
                                                <label>Pseudo</label>
                                                <input class="form-control form-control-sm" name="pseudo" value=" {{old('pseudo')}} " type="text" placeholder="Votre pseudo">
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control form-control-sm" name="password" value=" {{old('password')}} " type="password" placeholder="Entrez votre mot de passe">
                                            </div>

                                            <div class="form-group">
                                                <label> Photo de Profil</label>
                                                <input class="form-control form-control-sm" name="photo_profil"  type="file">
                                            </div>


                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-lg btn-primary" > <span class="fa fa-save"></span>S'inscrire </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#mode_id').change(function() {
                var selectedValue = $(this).val();
                console.log(selectedValue);

                if (selectedValue == 1 || selectedValue == 2) {
                    $("#tmoney_moov").show();
                    $("#money_gram").hide();
                    $("#west_union").hide();

                }else if(selectedValue == 3){
                    $("#west_union").show();
                    $("#tmoney_moov").hide();
                    $("#money_gram").hide();
                }else{
                    $("#money_gram").show();
                    $("#west_union").hide();
                    $("#tmoney_moov").hide();
                }

            });

        });

    </script>

@endsection
