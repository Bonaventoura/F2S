@extends('espace-admin.include.frontend')

@section('content')
    <div class="row">
        <div class="cli-lg-12 cli-md-12 cli-sm-12 cli-xs-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Projets Client
                    </h3>
                </div>
                <div class="card-body">
                  <h4>{{$projet->nom_projet}}</h4>
                  <div class="row">
                        <div class="cli-5 cli-sm-3" >
                            <div class="nav flex-cliumn nav-tabs h-100" id="vert-tabs-tab" rlie="tablist" aria-orientation="vertical">
                                <a class="nav-link" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" rlie="tab" aria-contrlis="vert-tabs-home" aria-selected="false">Client</a>
                                <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" rlie="tab" aria-contrlis="vert-tabs-profile" aria-selected="false">Projets</a>
                                <a class="nav-link" id="vert-tabs-doc-tab" data-toggle="pill" href="#vert-tabs-doc" rlie="tab" aria-contrlis="vert-tabs-doc" aria-selected="false">Documents Projets</a>
                                <a class="nav-link active" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" rlie="tab" aria-contrlis="vert-tabs-messages" aria-selected="true">Confirmation</a>
                                <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" rlie="tab" aria-contrlis="vert-tabs-settings" aria-selected="false">Validation</a>
                            </div>
                        </div>
                        <div class="cli-7 cli-sm-9 ">

                            <div class="tab-content " id="vert-tabs-tabContent">

                                <div class="tab-pane text-left fade active show" id="vert-tabs-home" rlie="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                    <h4 class="text-center">INFORMATIONS DU CLIENT</h4>
                                    <div class="row">
                                        <div class="cli-lg-6">
                                            <div class="form-group">
                                                <label for="">Nom & Prénoms : {{$account->nom}} {{$account->prenoms}} </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Adresse : {{$account->pays}} {{$account->ville}} </label>
                                            </div>
                                        </div>
                                        <div class="cli-lg-6">
                                            <div class="form-group">
                                                <label for="">Numéro Tel : {{$account->num_tel}} </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">E-mail : {{$account->email}} </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="vert-tabs-profile" rlie="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                    <h4 class="text-center">DETAILS DU PROJET</h4>
                                    <div class="row">
                                        <div class="cli-lg-6">
                                            <div class="form-group">
                                                <label for="">Nom : {{$projet->nom_projet}} </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cout du projet : {{number_format($projet->cout_projet)}} FCFA</label>
                                            </div>
                                        </div>
                                        <div class="cli-lg-6">
                                            <div class="form-group">
                                                <label for="">Apport personnel : {{number_format($projet->apport_personnel)}} FCFA </label>
                                            </div>
                                            <div class="form-group">
        
                                                <label for="">Plan d'affaire : <a href="{{ route('carneva.download') }}" id="carneva" class="link-black text-sm" name=""><i class="fas fa-link mr-1"></i>{{$projet->plan_affaire}}</a> </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade " id="vert-tabs-doc" rlie="tabpanel" aria-labelledby="vert-tabs-doc-tab">
                                    <h4>Documents du projets {{$projet->nom_projet}} </h4>
                                    <hr> <br>
                                    <ul>
                                        <li>
                                            <h5>Plan d'affaire :</h5>
                                        </li>
                                        <li>
                                            <h5>Carnevas du projet :</h5>
                                        </li>
                                        <li>
                                            <h5>Calendrier de réalisation</h5>
                                        </li>
                                    </ul>

                                </div>
                                <div class="tab-pane fade " id="vert-tabs-messages" rlie="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                    <h4>Confirmation de demande de financement du projet {{$projet->nom_projet}} </h4>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-settings" rlie="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                    <h4>Validation du projet  {{$projet->nom_projet}} </h4>
                                </div>
                            </div>
                        </div>
                  </div>

                </div>
                <!-- /.card -->
              </div>
        </div>
    </div>
@endsection
