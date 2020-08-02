@extends('espace-admin.include.frontend')

@section('content')

    @section('title')
        Backend | Les Groupes de clubs
    @endsection
    @section('title1')

    @endsection

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">

                        <h4 class="btn btn-block btn-primary">
                            Liste des Clubs crées
                        </h4>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>##</th>
                                    <th>Nom</th>
                                    <th>Groupe</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>

                                @foreach($membres as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->account_id}}</td>
                                        <td>{{$item->groupe_id}}</td>
                                        <td>
                                        </td>
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


@endsection
