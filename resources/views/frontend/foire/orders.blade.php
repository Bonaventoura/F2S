@extends('frontend.layouts.component')

@section('content')
<div class="news">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="text-center alert alert-success">MES COMMANDES</h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="bg-warning">
                    @include('layouts.messages')
                </div>

                <div class="table-responsive shadow-lg">
                    <table class="table table-hover">
                        <thead class="text-white" style="background-color: #003679">
                            <tr>
                                <th>N°</th>
                                <th>User</th>
                                <th>Token</th>
                                <th>Quantité (produits) </th>
                                <th>Prix Total cmd (XOF) </th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $cmd)
                            <tr>
                                <td> {{$cmd->id}} </td>
                                <td>{{$cmd->user->name}}</td>
                                <td> {{$cmd->token}} </td>
                                <td>{{$cmd->total_quantity}} </td>
                                <td>{{number_format($cmd->prix_total_cmd)}}</td>
                                <td> {{$cmd->created_at->format('d-m-Y : H:i:s')}} </td>
                                <td>
                                    @if ($cmd->status == 0 )
                                    <span class="badge alert-warning">Non payé</span>
                                    @else
                                    <span class="badge alert-success">Déjà payé</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('detail-order', $cmd) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
