@extends('layouts.frontend')

@section('page')
    <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Inputs
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
    <section class="section bg-secondary">
        <div class="container">

            <header class="section-header">
                <h2>ESPACE DE CREATION DE BOUTIQUE</h2>
                <hr>
                <p class="lead">Text inputs, selects and textarea in three different sizes</p>
            </header>


            <form action="{{ route('boutiques.store') }}" method="post" class="form-group" enctype="multipart/form-data">
                @csrf
                <div class="row gap-y">
                    <div class="card col-lg-12">
                        <div class="card-header text-center">
                            ESPACE DE CREATION DE BOUTIQUE
                        </div>
                        <div class="card-body">
                            @include('layouts.messages')
                            <div class="row">


                                <div class="col-md-6">

                                    <input class="form-control form-control-sm" name="pseudo" type="hidden"  value="{{$pseudo}}" readonly>
                                    <div class="form-group">
                                        <label>Nom de la Boutique</label>
                                        <input class="form-control form-control-sm" name="nom_boutique" type="text" placeholder="Le nom de la boutique svp" value="{{old('nom_boutique')}}">
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
                                        <input class="form-control form-control-sm" name="ville" type="text" placeholder="Saisir la ville " value=" {{old('ville')}} ">
                                    </div>

                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input class="form-control form-control-sm" name="avatar" type="file">
                                    </div>



                                </div>

                                <div class="col-md-6">



                                    <div class="form-group">
                                        <label>Numéro de Contact</label>
                                        <input class="form-control form-control-sm" name="contact_boutique" value=" {{old('contact_boutique')}} " type="number" placeholder="Votre numéro de contact">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control form-control-sm" name="email_boutique" value=" {{old('email_boutique')}} " type="text" placeholder="Votre adresse e-mail">
                                    </div>

                                    <div class="form-group">
                                        <label>Mode de règlemnt</label>
                                        <select class="form-control form-control-sm" name="mode_reglement">
                                            <option value="tmoney">Tmoney</option>
                                            <option value="flooz">Flooz</option>
                                            <option value="western_union">Western Union</option>
                                            <option value="visa">Carte visa</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="quartier">Quartier</label>
                                        <input type="text" name="quartier" id="quartier" class="form-control form-control-sm" value=" {{old('quartier')}} ">
                                    </div>

                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-lg btn-primary"> <span class="fa fa-save"></span>S'inscrire </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>


@endsection

