@extends('espace-admin.include.frontend')
@section('title')
    Dashbord
@endsection
@section('title1')
    Projets Clubs
@endsection
@section('title2')
    Main
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Projects</h3>
  
            <div class="card-tools">
                <a href="{{ route('projects.create') }}" class="btn btn-primary">Créer nouveau projet</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Project Name</th>
                        <th style="width: 20%">Club</th>
                        <th style="width: 30%"> Bureau</th>
                        <th style="width: 8%" class="text-center">Status</th>
                        <th style="width: 20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $item)
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a>
                                {{$item->nom_project}}
                            </a>
                            <br/>
                            <small>
                                Crée le {{$item->created_at->format('d.m.Y')}}
                            </small>
                        </td>
                        <td> {{$item->club->groupe->nom}} </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar04.png">
                                </li>
                            </ul>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Success</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>                               
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>                               
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>                               
                            </a>
                        </td>
                    </tr>
                    @endforeach
                                        
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
  
      </section>
      <!-- /.content -->

@endsection
