@extends('espace-admin.include.frontend')

@section('content')

    @section('title')
        Les membres du clubs {{$groupe->nom}}
    @endsection
    @section('title1')
        {{$groupe->ville}}
    @endsection

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">

                        <h4 class="btn btn-block btn-primary">
                            Liste des membres du Clubs {{$groupe->nom}} 
                        </h4>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>##</th>
                                    <th>Profil</th>
                                    <th>Nom && Prénoms</th>
                                    <th>Groupe</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>

                                @foreach($membres as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <img src="/storage/profil/{{$item->account->photo_profil}}" width="70" height="50" class="img-thumbnail img-rounded" alt="">
                                        </td>
                                        <td>{{$item->account->nom}}  {{$item->account->prenoms}}</td>
                                        <td>{{$item->groupe->nom}}</td>
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
