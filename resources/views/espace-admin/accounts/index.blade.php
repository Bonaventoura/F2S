@extends('espace-admin.include.frontend')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">

                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                            Add New Transaction
                        </button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>##</th>
                                <th>Nom & Prénoms</th>
                                <th>Ville</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach ($accounts as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->nom}} {{$item->prenoms}}</td>
                                    <td>{{$item->ville}} </td>
                                    <td>
                                        @if ($item->actif == 0)
                                            <button class="btn btn-danger btn-xs">Inactif</button>
                                        @else
                                            <button class="btn btn-success btn-xs">Actif</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('accounts.show', ['nom'=>$item->nom]) }}" class="btn btn-xs btn-primary"><span class="fa fa-eye"></span></a>
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

