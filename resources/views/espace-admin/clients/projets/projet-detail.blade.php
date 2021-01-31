@extends('espace-admin.include.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

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
                        <div class="col-5 col-sm-3" >
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="false">Client</a>
                                <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Projets</a>
                                <a class="nav-link active" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="true">Confirmation</a>
                                <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Validation</a>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9 ">

                            <div class="tab-content bg-navy" id="vert-tabs-tabContent">

                                <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                    <h4 class="text-center">INFORMATIONS DU CLIENT</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Nom & Prénoms : {{$account->nom}} {{$account->prenoms}} </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Adresse : {{$account->pays}} {{$account->ville}} </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Numéro Tel : {{$account->num_tel}} </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">E-mail : {{$account->email}} </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                    <h4 class="text-center">DETAILS DU PROJET</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Nom : {{$projet->nom_projet}} </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cout du projet : {{$projet->cout_projet}}</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Apport personnel : {{$projet->apport_personnel}} </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Plan d'affaire : {{$projet->plan_affaire}} </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade " id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">

                                </div>
                                <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">

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
