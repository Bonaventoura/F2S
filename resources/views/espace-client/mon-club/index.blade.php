@extends('espace-client.include')

@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800"> Back Office | Club Crowfounding</h1>
              <a href="{{ route('projets.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Consultez le Projet du club</a>
            </div>

            <!-- Content Row -->


            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Mon Club | {{$club->groupe_id}} </h6>
                            <h6 class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> {{$club->count()}} Membres</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <th>##</th>
                                    <th>Avatar</th>
                                    <th>Nom</th>
                                    <th>Prénoms</th>
                                    <th>Fonction</th>
                                </thead>
                                <tbody>
                                    <?php $i=1 ?>
                                    @foreach ($membres as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>
                                                <img src="/storage/profil/{{$item->account->photo_profil}}" class="img-rounded img-thumbnail" alt="">
                                            </td>
                                            <td>{{$item->account->nom}}</td>
                                            <td>{{$item->account->prenoms}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>


        </div>
        <!-- /.container-fluid -->

@endsection
