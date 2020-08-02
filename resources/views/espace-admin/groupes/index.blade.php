@extends('espace-admin.include.frontend')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">

                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                            Add New Club
                        </button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>##</th>
                                <th>Nom du Club</th>
                                <th>Ville du Club</th>
                                <th>Nombres de Membres</th>
                            </tr>
                            </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach ($groupes as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->nom}}</td>
                                    <td>{{$item->ville}}</td>
                                    <td>{{$item->clubs->count()}}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
      <!-- /.content -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajout de nouveau Club</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            Ajouter un nouveau Club
                        </div>
                        <div class="card-body">
                            <form action="{{ route('groupes.store') }}" method="post" class="form-horizontal">
                                @csrf

                                <div class="form-group">
                                    <label for="">Nom du Club</label>
                                    <div class="row">
                                        <input type="text" name="nom" id="nom" value="Le nom du club" readonly class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Localisation du Club</label>
                                    <div class="row">
                                        <input type="text" name="ville" id="vllle"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary"><span class="fa fa-save"></span>Save Transaction</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- /.modal -->

@endsection
