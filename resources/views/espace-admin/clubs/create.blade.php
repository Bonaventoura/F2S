@extends('espace-admin.include.frontend')

@section('title')
    Gest Club | {{$groupe->nom}}
@endsection
@section('title1')
    Insertion des membres
@endsection
@section('title2')
    {{$groupe->ville}}
@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-header">
                        <h4>Nombre de personnes à ajouter : {{$data->count()}} </h4>
                        @include('layouts.messages')
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>##</th>
                                    <th>Nom </th>
                                    <th>Prénoms</th>
                                    <th>Ville</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->nom}}</td>
                                        <td> {{$item->prenoms}} </td>
                                        <td> {{$item->ville}} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($data->count() >0) 
                            <form action="{{ route('clubs.store') }}" method="post">
                                @csrf
                                @foreach ($data as $item)
                                    <input type="hidden" name="groupe_id" value="{{$groupe_id}}" id="groupe_id">
                                    <input type="hidden" name="account_id[]" value="{{$item->id}}" id="">
                                @endforeach
                                <button type="submit" class="btn btn-sm btn-outline-primary" >
                                    Ajouter les membres au club {{$groupe->nom}}
                                </button>
                            </form>
                        @else
                            <a href="javascript:history.back()" class="btn btn-block btn-danger">Aucune données ne correspond à vos critères, Réessayez</a>
                        @endif
                        

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <a href="javascript:history.back()" class="btn btn-sm btn-outline-danger">Retour</a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
      <!-- /.content -->


@endsection
