@extends('espace-admin.include.frontend')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">

                        <a href="{{ route('activations.create') }}" class="btn btn-sm btn-primary">
                            AJouter nouvelle transaction
                        </a>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('layouts.messages')
                        <table id="example1" class="table table-bordered table-responsive-lg">
                            <thead>
                            <tr>
                                <th>##</th>
                                <th>Mode de paiement</th>
                                <th>Numero Envoi</th>
                                <th>Code de Reference</th>
                                <th>Numéro MTCN</th>
                                <th>Num ref MoneyGram</th>
                                <th>Montant</th>
                                <th>Date Envoi</th>
                            </tr>
                            </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach ($activations as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->mode->nom_mode}}</td>
                                    <td>{{$item->numero_envoi}}</td>
                                    <td>{{$item->codeRef}}</td>
                                    <td>{{$item->numero_mtcn}}</td>
                                    <td>{{$item->money_gram}}</td>
                                    <td>{{$item->montant}} </td>
                                    <td>{{$item->created_at}}</td>
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

