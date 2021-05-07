@extends('espace-admin.include.frontend')

@section('content')

@section('title')
    Dashbord
@endsection
@section('title1')
    Projets Clients
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
            <h3 class="card-title">Projets</h3>

            <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
          </div>
          <div class="card-body p-0">

            <table class="table table-striped projets">
                <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Project Name</th>
                        <th style="width: 20%">Auteur</th>
                        <th style="width: 30%"> Coût du projet</th>
                        <th style="width: 8%" class="text-center">Status</th>
                        <th style="width: 20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projets as $projet)
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a>
                                {{$projet->nom_projet}}
                            </a>
                            <br/>
                            <small>
                                Crée le {{$projet->created_at->format('d.m.Y')}}
                            </small>
                        </td>
                        <td> {{$projet->account->nom}} </td>
                        <td> {{$projet->cout_projet}}</td>
                        <td class="project-state">
                            @if ($projet->status == 1)
                                <span class="badge badge-success">Validé</span>
                            @else
                                <span class="badge badge-pill badge-warning">Non validé</span>
                            @endif
                            
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('validations.detail-projet',['projet'=>$projet->id] ) }}">
                                <i class="fas fa-folder">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{$projets}}
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->

@endsection

@endsection
