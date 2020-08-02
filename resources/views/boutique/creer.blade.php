@extends('layouts.frontend')

@section('content')

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Créer ma boutique en ligne Us</h3>
                        <p><a href="index.html">Home</a> / Boutique</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->



    <div class="features_area add_padding">
        <div class="container">
            <div class="row">
               <div class="col-xl-12">
                    <div class="section_title text-center mb-50">
                            <h3>Our Features</h3>
                        </div>
               </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-4 col-md-4">
                    <div class="single_feature text-center">
                        <div class="icon">
                            <i class="flaticon-sketch"></i>
                        </div>
                        <h3>Creative Plan & Design</h3>
                        <p>There are many variations of passages of lorem Ipsum available, but the majority have
                            suffered alteration.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single_feature text-center">
                        <div class="icon">
                            <i class="flaticon-helmet"></i>
                        </div>
                        <h3>Talented Peoples</h3>
                        <p>There are many variations of passages of lorem Ipsum available, but the majority have
                            suffered alteration.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single_feature text-center">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>
                        <h3>Modern Tools</h3>
                        <p>There are many variations of passages of lorem Ipsum available, but the majority have
                            suffered alteration.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features_area_end -->

    <section class="service_area add_padding bg-secondary ">
        <div class="container">

            <form action="{{ route('boutiques.store') }}" method="post" class="form-group" enctype="multipart/form-data">
                @csrf
                <div class="row gap-y mb-50">
                    <div class="card col-lg-12">
                        <div class="card-header bg-primary text-center">
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
