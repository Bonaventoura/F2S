@extends('espace_client.include.frontend')

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            Edition de projet:  {{$projet->nom_projet}}
        </div>
        <div class="card-body">
            <form id="form_project" action="{{ route('projets.update',$projet) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">@include('layouts.messages')</div>
                    <div class="col-md-6">
                        <div class="card card-primary shadow-lg">
                            <div class="card-header">
                                <h3 class="card-title">Information générale du projet</h3>
        
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        <div class="card-body">
        
                            <input type="hidden" name="account_id" value=" {{$account->id}} ">
                            <div class="form-group">
                                <label for="nom_projet">Nom du projet</label>
                                <input type="text" id="nom_projet" name="nom_projet" value=" {{old('nom_projet') ?? $projet->nom_projet}} " class="form-control form-control-sm">
                            </div>
        
                            <div class="form-group">
                                <strong><label for="sm">Situation matrimoniale</label></strong>
                                <select name="sm" id="sm" class="form-control form-control-sm" >
                                    <option value="marié">Marié</option>
                                    <option value="célibataire">Célibataire</option>
                                    <option value="divorcé">Divorcé</option>
                                </select>
                            </div>
        
                            <div class="form-group">
                                <strong><label for="domaine_id">Dans quelle domaine_id d'activité se situe votre projet ?</label></strong>
                                <select name="domaine_id" id="domaine_id" class="form-control form-control-sm">
                                    @foreach ($domaines as $item)
                                        <option value="{{$item->id}}"
                                            @if ($projet->domaine_id == $item->id)
                                                selected
                                            @endif    
                                        >{{$item->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
        
                            <div class="form-group">
                                <strong><label for="taille_entreprise">Quelle est la taille de votre entreprise</label></strong>
                                <select name="taille_entreprise" id="taille_entreprise" class="form-control form-control-sm">
                                    <option value="start-up">start-up</option>
                                    <option value="pme-pmi">PME/PMI import-export</option>
                                    <option value="sa">SA ou Autres</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <strong><label for="actualité">L'objet de votre projet est-il d'actualité ?</label></strong>
                                <select name="actualité" id="actualité" class="form-control form-control-sm">
                                    <option value="innovation">Mon projet est une innovation(je suis le 1er à l'initier)</option>
                                    <option value="photocopie">Mon projet est une photocopie des projets déjà existants(0 à 5ans)</option>
                                    <option value="ancien">Projets existants (10ans et plus)</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary shadow-lg">
                            <div class="card-header">
                                <h3 class="card-title">Budget du projet</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
        
                                <div class="form-group">
                                    <strong><label for="cout_projet">A combien est évalué le coût globale de votre projet</label></strong>
                                    <input type="text" name="cout_projet" id="cout_projet" value="{{old('cout_projet') ?? $projet->cout_projet}}" class="form-control form-control-sm" >
                                </div>
        
                                <div class="form-group">
                                    <strong><label for="apport_personnel">Apport Personnel</label></strong>
                                    <input type="text" name="apport_personnel" id="apport_personnel" value="{{old('apport_personnel') ??$projet->apport_personnel}}" class="form-control form-control-sm" >
                                </div>
        
                                <div class="form-group">
                                    <strong><label for="type_remboursement">Le type de remboursement pour le financement de votre projet</label></strong>
                                    <select name="type_remboursement" id="type_remboursement" class="form-control form-control-sm">
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
                                    <label for="duree_projet">Durée du projet</label>
                                    <input type="text" id="duree_projet" name="duree_projet" value="{{old('duree_projet') ?? $projet->duree_projet}}" class="form-control form-control-sm">
                                </div>
        
                                <div class="form-group">
                                    <strong><label for="plan_affaire">Charger le fichier du plan d'affaire</label></strong>
                                    <input type="file" name="plan_affaire" id="plan_affaire" class="form-control form-control-sm">
                                </div>
        
                            </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="description">Description du projet</label>
                            <textarea id="description" name="description" class="form-control form-control-sm" rows="4">
                                {{old('description') ?? $projet->description}}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-5">
                        <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Mettre à jour le projet" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
    

  </section>
@endsection
