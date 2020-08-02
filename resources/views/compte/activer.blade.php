@extends('frontend.layouts.frontend')

@section('slider_home')
    <div class="home_slider_container">

        <!-- Home Slider -->

        <div class="owl-carousel owl-theme home_slider mb-2">

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/about.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>ACTIVATION DE COMPTE</h1>
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
                    <form id="form" action="{{ route('account.activation') }}" method="post" class="form-group">
                        @csrf
                        <div class="row gap-y">
                            <div class="card card-primary col-lg-12 ">

                                <div class="card-header text-center">
                                    ESPACE D'ACTIVATION DE COMPTE
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
                                                <label>Pseudo</label>
                                                <input class="form-control form-control-sm" name="pseudo" value=" {{old('pseudo')}} " type="text" placeholder="Votre pseudo">
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <u><h5>Informations de comptes</h5><br></u>

                                            <div class="form-group">
                                                <label>Mode de Paiement</label>
                                                <select name="mode_id" id="mode_id" class="form-control form-control-sm" >
                                                    <option value="0">Choisir un mode de payement</option>
                                                    @foreach ($modes as $item)
                                                        <option value="{{$item->id}}">{{$item->nom_mode}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div id="tmoney_moov" style="display: none">
                                                <div class="form-group" >
                                                    <label>Numero d'envoi</label>
                                                    <input class="form-control form-control-sm" name="numero_envoi" value=" {{old('numero_envoi')}} " type="text" placeholder="Votre adresse e-mail">
                                                </div>

                                                <div class="form-group">
                                                    <label for="codeRef">Code de Reference</label>
                                                    <input class="form-control form-control-sm" name="codeRef" value=" {{old('codeRef')}} " type="number" >
                                                </div>
                                            </div>



                                            <div class="form-group" style="display: none" id="west_union" >
                                                <label>Numero MTCN WEST UNION</label>
                                                <input class="form-control form-control-sm" name="numero_mtcn" id="numero_mtcn" value=" {{old('numero_mtcn')}}" maxlength="11"  type="text" placeholder="Votre adresse e-mail">
                                            </div>

                                            <div class="form-group" style="display: none" id="money_gram" >
                                                <label>Numero de Reference Money Gram</label>
                                                <input class="form-control form-control-sm" name="money_gram" id="money_gram" maxlength="9" value=" {{old('money_gram')}} " type="text" placeholder="Votre adresse e-mail">
                                            </div>

                                            <div class="form-group">
                                                <label>Montant envoyé</label>
                                                <input class="form-control form-control-sm" name="montant" value=" {{old('montant')}} " type="number" >
                                            </div>

                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-block btn-primary" > <span class="fa fa-save"></span>Activer mon compte </button>
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


