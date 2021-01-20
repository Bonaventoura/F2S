@extends('espace-admin.include.frontend')
@section('title')
    Dashbord
@endsection
@section('title1')
    Projets Clubs
@endsection
@section('title2')
    Nouveau projet
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.messages')
        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="card shadow mb-4 card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations General du Projet</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nom_project">Nom du projet </label>
                                <input type="text" name="nom_project" id="nom_project" value="{{old('nom_project')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Club</label>
                                <select class="form-control" name="club_id">
                                    @foreach ($clubs as $item)
                                        <option value="{{$item->id}}">{{$item->id}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Chef de projet</label>
                                <select class="form-control custom-select" name="chef_project">
                                    @foreach ($clubs as $item)
                                        <option value="{{$item->id}}">{{$item->groupe->nom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputProjectLeader">Cahier de Charge du projet </label>
                                <input type="file" name="cahier_charge" id="inputProjectLeader" value="{{old('cahier_charge')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Description">Project Description</label>
                                <textarea name="description" id="Description" class="form-control" rows="4"> {{old('description')}} </textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-5 card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Budget du Projet</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Estimation du budget</label>
                                <input type="number" name="budget" id="inputEstimatedBudget" value="{{old('budget')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputSpentBudget">Total Montant financé</label>
                                <input type="number" name="montant_project" id="inputSpentBudget" value="{{old('montant_project')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Estimation de la durée du project (Nombre de mois)</label>
                                <input type="number" name="duree_project" id="inputEstimatedDuration"  value="{{old('duree_project')}}" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
                    <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                </div>
            </div>
        </form>

      </section>
      <!-- /.content -->
@endsection
