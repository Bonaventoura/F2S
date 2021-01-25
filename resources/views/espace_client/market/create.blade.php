@extends('espace_client.include.frontend')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h4>Création d'une nouvelle Boutique</h4>
                    </div>
                    <div class="card-body">
                        <form id="form_market" data-route="{{ route('boutiques.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('layouts.messages')
                            <div class="row">

                                <div class="col-md-6">

                                    <input class="form-control form-control-sm" name="account_id" id="account_id" type="hidden"  value="{{$account_id}}">
                                    <div class="form-group">
                                        <label for="nom_boutique">Nom de la Boutique</label>
                                        <input class="form-control form-control-sm" name="nom_boutique" id="nom_boutique" type="text" placeholder="Le nom de la boutique svp" value="{{old('nom_boutique')}}">
                                        <span class="text-danger" id="error_nom"></span>
                                    </div>

                                    <div class="form-group">
                                        <strong><label for="domaine">Dans quelle domaine d'activité se situe votre projet ?</label></strong>
                                        <select name="domaine" id="domaine" class="form-control form-control-sm">
                                            <option value="agro">Agro</option>
                                            <option value="industrie">Industrie(PMI)</option>
                                            <option value="exportateur">Exportateur de produits de rente brut(PME)</option>
                                            <option value="commerce_gros">Commerce de gros import-export</option>
                                            <option value="commerce_demis">Commerce demis gros</option>
                                            <option value="commerce_detail">Commerce Details</option>
                                            <option value="artisanat">Artisanat</option>
                                            <option value="technologie">Technologie</option>
                                            <option value="autres">Autres produits et services</option>
                                        </select>
                                        <span class="text-danger" id="error_domaine"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Pays</label>
                                        <select class="form-control form-control-sm" name="pays" id="pays">
                                            <option value="">Choisir le pays</option>
                                            <option value="togo">Togo</option>
                                            <option value="benin">Benin</option>
                                            <option value="ghana">Ghana</option>
                                            <option value="cote-d'ivoire">Côte d'Ivoire</option>
                                            <option value="burkina-faso">Burkina Faso</option>
                                            <option value="mali">Mali</option>
                                            <option value="gabon">Gabon</option>
                                            <option value="congo">Congo</option>
                                        </select>
                                        <span class="text-danger" id="error_pays"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Ville</label>
                                        <input class="form-control form-control-sm" name="ville" id="ville" type="text" placeholder="Saisir la ville " >
                                        <span class="text-danger" id="error_ville"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input class="form-control form-control-sm" name="avatar" type="file">
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Numéro de Contact</label>
                                        <input class="form-control form-control-sm" name="contact_boutique" id="contact_boutique" value=" {{old('contact_boutique')}} " type="text" placeholder="Votre numéro de contact">
                                        <span class="text-danger" id="error_contact"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control form-control-sm" name="email_boutique" id="email_boutique" value=" {{old('email_boutique')}} " type="email" placeholder="Votre adresse e-mail">
                                        <span class="text-danger" id="error_email"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Mode de règlement</label>
                                        <select class="form-control form-control-sm" name="mode_reglement">
                                            <option value="">Veuillez choisir un mode de règlement</option>
                                            <option value="tmoney">Tmoney</option>
                                            <option value="flooz">Flooz</option>
                                            <option value="western_union">Western Union</option>
                                            <option value="visa">Carte visa</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="quartier">Quartier</label>
                                        <input type="text" name="quartier" id="quartier" class="form-control form-control-sm" placeholder="Le quartier de la boutique" value=" {{old('quartier')}} ">
                                        <span class="text-danger" id="error_quartier"></span>
                                    </div>

                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" id="btn_create" class="btn btn-lg btn-primary"> <span class="fa fa-save"></span>Créer ma boutique</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        $(document).ready(function () {
            //alert('test jquery');

            var error_nom = false;
            var error_domaine = false;
            var error_pays = false;
            var error_ville = false;
            var error_contact = false;
            var error_email = false;
            var error_quartier = false;

            function check_nom() {
                var nom = $('#nom_boutique').val();

                if ( nom !=='' && nom.length > 0) {
                    console.log('correct');
                    $('#error_nom').hide();
                    return error_nom = false;
                } else {
                    console.log('incorrect');
                    $('#error_nom').show();
                    $('#error_nom').html("Veuillez entrez un nom de boutique valide");
                    return error_nom = true;
                }
            }

            function check_ville() {
                var ville = $('#ville').val();

                if ( ville !=='' && ville.length > 0) {
                    console.log('correct');
                    $('#error_ville').hide();
                    return error_ville = false;
                } else {
                    console.log('incorrect');
                    $('#error_ville').show();
                    $('#error_ville').html("Veuillez entrez la ville où se situe la boutique");
                    return error_ville = true;
                }
            }

            function check_email() {
                var email = $('#email_boutique').val();

                if ( email !=='' && email.length > 0) {
                    console.log('correct');
                    $('#error_email').hide();
                    return error_email = false;
                } else {
                    console.log('incorrect');
                    $('#error_email').show();
                    $('#error_email').html("Veuillez entrez l'adresse mail de la boutique");
                    return error_email = true;
                }
            }

            function check_quartier() {
                var quartier = $('#quartier').val();

                if ( quartier !=='' && quartier.length > 0) {
                    console.log('correct');
                    $('#error_quartier').hide();
                    return error_quartier = false;
                } else {
                    console.log('incorrect');
                    $('#error_quartier').show();
                    $('#error_quartier').html("Veuillez entrez le quartier où se situe la boutique");
                    return error_quartier = true;
                }
            }

            function check_pays() {
                $('#pays').change(function () {
                    var pays = $(this).val();
                    if (pays !== '' && pays.length >0) {
                        console.log('correct');
                        $('#error_pays').hide();
                        return error_pays = false;
                    } else {
                        console.log('incorrect');
                        $('#error_pays').show();
                        $('#error_pays').html("Veuillez choisir un pays svp");
                        return error_pays = true;
                    }
                });
            }

            function check_domaine() {
                $('#pays').change(function () {
                    var domaine = $(this).val();
                    if (domaine !== '' && domaine.length >0) {
                        console.log('correct');
                        $('#error_domaine').hide();
                        return error_domaine = false;
                    } else {
                        console.log('incorrect');
                        $('#error_domaine').show();
                        $('#error_domaine').html("Veuillez choisir un pays svp");
                        return error_domaine = true;
                    }
                });
            }



            $('#pays').change(function () {
                check_pays();
            });

            $('#domaine').change(function () {
                check_domaine();
            });

            $('#nom_boutique').focusout(function () {
                check_nom();
            });

            $('#ville').focusout(function () {
                check_ville();
            });

            $('#quartier').focusout(function () {
                check_quartier();
            });

            $('#email_boutique').focusout(function () {
                check_email();
            });

            $('#btn_create').click(function () {
                check_email();
                check_quartier();
                check_ville();
                check_nom();
                check_domaine();
                check_pays();
            });

            $('#form_market').submit(function (e) {
                e.preventDefault();
                check_email();
                check_quartier();
                check_ville();
                check_nom();
                check_domaine();
                check_pays();

                var route = $(this).data('route');

                $.ajax({
                    type: "POST",
                    url: route,
                    data: new FormData(this),
                    dataType: "JSOM",
                    contentType:false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                    }
                });
            });


        });
    </script>
@endsection
