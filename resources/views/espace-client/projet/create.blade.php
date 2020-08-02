@extends('espace-client.include')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"> Back Office | Projet Personnel</h1>
        </div>

        <!-- Content Row -->



        <!-- Content Row -->

        <div class="row">

          <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-primary">Create Projet Personnel</h6>

                    </div>
                <!-- Card Body -->
                    <div class="card-body">

                        @include('layouts.messages')

                        <form action="{{ route('projets.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                
                                    <div class="col-lg-4 col-xl-4">
                                        <h4>Informations Personnele</h4>
                                        <div class="card mb-4">
                                            <div class="card-header bg-gradient-primary text-white">
                                            Default Card Example
                                            </div>
                                            <div class="card-body">

                                            <input type="hidden" name="accounts_id" value="{{$id}}">
                                                <div class="form-group">
                                                    <strong><label for="nom">Nom</label></strong>
                                                    <input type="text" name="nom" id="nom" class="form-control" value=" {{$nom}}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="prenoms">Prenoms</label></strong>
                                                    <input type="text" name="nom" id="nom" class="form-control" value=" {{$prenoms}}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="sexe">Sexe</label></strong>
                                                <input type="text" name="sexe" id="sexe" class="form-control" value="{{$sexe}}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="email">Email</label></strong>
                                                <input type="email" name="email" id="email" class="form-control" value="{{$email}}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="num_tel">Contact</label></strong>
                                                <input type="number" name="num_tel" id="num_tel" class="form-control" value="{{$num_tel}}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="adresse">Adresse</label></strong>
                                                    <input type="text" name="adresse" id="adresse" class="form-control" placeholder="votre quartier">
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="sm">Situation matrimoniale</label></strong>
                                                    <select name="sm" id="sm" class="form-control">
                                                        <option value="marié">Marié</option>
                                                        <option value="célibataire">Célibataire</option>
                                                        <option value="divorcé">Divorcé</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="plan_affaire">Charger le fichier du plan d'affaire</label></strong>
                                                    <input type="file" name="plan_affaire" id="plan_affaire" class="form-control">
                                                </div>



                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-8 col-xl-8">
                                        <h4>Informations du Projet</h4>

                                        <div class="card mb-4">
                                            <div class="card-header bg-gradient-primary text-white">
                                            Default Card Example
                                            </div>
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <strong><label for="cout_projet">A combien est évalué le coût globale de votre projet</label></strong>
                                                <input type="number" name="cout_projet" id="cout_projet" value="{{old('cout_projet')}}" class="form-control" >
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="apport_personnel">Apport Personnel</label></strong>
                                                    <input type="number" name="apport_personnel" id="apport_personnel" value="{{old('apport_personnel')}}" class="form-control" >
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="nature_projet">Quelle est la nature de votre apport personnel au projet</label></strong>
                                                    <select name="nature_projet" id="nature_projet" class="form-control">
                                                        <option value="nature">Apport en nature</option>
                                                        <option value="numeraire">Apport en numéraire</option>
                                                        <option value="complémentaire">Apport complémentaire en nature et en numéraire</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="domaine">Dans quelle domaine d'activité se situe votre projet ?</label></strong>
                                                    <select name="domaine" id="domaine" class="form-control">
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
                                                    <strong><label for="actualité">L'objet de votre projet est-il d'actualité ?</label></strong>
                                                    <select name="actualité" id="actualité" class="form-control">
                                                        <option value="innovation">Mon projet est une innovation(je suis le 1er à l'initier</option>
                                                        <option value="photocopie">Mon projet est une photocopie des projets déjà existants(0 à 5ans)</option>
                                                        <option value="ancien">Projets existants (10ans et plus)</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="type_remboursement">Le type de remboursement pour le financement de votre projet</label></strong>
                                                    <select name="type_remboursement" id="type_remboursement" class="form-control">
                                                        <option value="sans_différé">Les remboursements sans différé</option>
                                                        <option value="differe_1">Les remboursements avec différé d'un mois</option>
                                                        <option value="differe_3">Les remboursements avec différé de 3 mois</option>
                                                        <option value="differe_6">les remboursement avec différé de 6 mois</option>
                                                        <option value="differe_9">Les remboursements avec différé de 9 mois</option>
                                                        <option value="differe_12">Les remboursements avec différé de 12 mois</option>
                                                        <option value="autre_rembouresement">Autre remboursement</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <strong><label for="taille_entreprise">Quelle est la taille de votre entreprise</label></strong>
                                                    <select name="taille_entreprise" id="taille_entreprise" class="form-control">
                                                        <option value="start-up">start-up</option>
                                                        <option value="pme-pmi">PME/PMI import-export</option>
                                                        <option value="sa">SA ou Autres</option>
                                                    </select>
                                                </div>



                                                <div class="form-group">
                                                    <strong><label for="description">Description du projet</label></strong>
                                                <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary" name="submit" >Valider</button>
                                    </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>


    </div>
    <!-- /.container-fluid -->

@endsection
