@extends('espace_client.include.frontend')

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Projects</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <a href="{{ route('projets.create') }}" class="btn btn-sm btn-primary" ><i class="fas fa-folder"></i> Nouveau projet</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Nom Projet
                        </th>
                        <th style="width: 30%">
                            Domaine
                        </th>
                        <th>
                            Coût
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($projets as $projet)
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a>
                                {{$projet->nom_projet}}
                            </a>
                            <br>
                            <small>
                                Créer le {{$projet->created_at->format('d-m-Y')}}
                            </small>
                        </td>
                        <td>
                            {{$projet->domaine}}
                        </td>

                        <td class="project_progress">
                            {{$projet->cout_projet}} FCFA
                        </td>

                        <td class="project-state">
                            @if ($projet->financer == 0)
                            <span class="badge badge-warning">En cours</span>
                            @else
                            <span class="badge badge-success">Validé</span>
                            @endif
                        </td>

                        <td class="project-actions text-right">

                            <a class="btn btn-primary btn-sm" href="{{ route('projets.show', $projet) }}">
                                <i class="fas fa-folder"></i>
                            </a>

                            <a class="btn btn-info btn-sm" href="{{ route('projets.edit',$projet) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a class="btn btn-danger btn-sm" href="{{ route('projets.destroy',$projet) }}">
                                <i class="fas fa-trash"></i>
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
@endsection
