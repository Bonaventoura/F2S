@extends('espace-client.include')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Back Office | Boutiques</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre de visites</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                        <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        @foreach ($boutiques as $item)
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Ma Boutique  {{$item->nom_boutique}} </h6>
                                <a href="{{ route('boutiques.edit', ['id'=>$item->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Editer</a>
                            </div>
                                <!-- Card Body -->
                            <div class="card-body">
                                <u><h3 class="text-center">Les Informations de ma Boutique  {{$item->nom_boutique}}  </h3></u>
                                <hr>

                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#tab-home-1"><button class="btn btn-dark">Home</button></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#tab-profile-1"><button class="btn btn-dark">Localisation</button></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#tab-contact-1"><button class="btn btn-dark">Contact</button></a>
                                    </li>
                                </ul>

                                <div class="tab-content p-4">
                                    <div class="tab-pane fade show active" id="tab-home-1">

                                        <div class="card">
                                            <div class="card-header bg-info">Identité</div>
                                            <div class="card-body">

                                                <div class=" form-group">
                                                    <label for="">Nom de Boutique : <strong>{{$item->nom_boutique}}</strong></label>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Propriétaire : <strong>{{$user}}</strong></label>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Domaine : <strong>{{$item->domaine_activite}}</strong></label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="tab-profile-1">
                                        <div class="card">
                                            <div class="card-header bg-info">Localisation</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Pays : <strong>{{$item->pays}}</strong></label>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Ville : <strong>{{$item->ville}}</strong></label>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Quartier : <strong>{{$item->quartier}}</strong></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-contact-1">
                                        <div class="card">
                                            <div class="card-header bg-info">Contact</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Email de la Boutique : <strong>{{$item->email_boutique}}</strong></label>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Contact : <strong>{{$item->contact_boutique}}</strong></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        <!-- Content Row -->

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary"> {{$item->nom_boutique}} |Mes Produits</h6>
                                <a href="{{ route('products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-envelope fa-sm text-white-50"></i>Charger produit</a>
                        </div>
                            <!-- Card Body -->
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Nom du produit</th>
                                            <th>Domaine </th>
                                            <th>Prix en gros</th>
                                            <th>Prix de vente</th>
                                            <th>Action</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i=1 ; ?>
                                        @foreach ($products as $product)
                                            <tr>

                                                <td>{{$i++}}</td>
                                                <td>
                                                    <img src="/storage/produits/{{$product->photo_produit}}" alt="" width="70px" height="40px">
                                                </td>
                                                <td>{{$product->nom_produit}}</td>
                                                <td>{{$product->domaine_usage_produit}}</td>
                                                <td>{{$product->prix_unit_gros}}</td>
                                                <td>{{$product->prix_unit_vente}}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span></a>
                                                </td>
                                                <td>
                                                    <form action=" {{route('products.destroy',['id'=>$product->id])}} " method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash">Supp</span></button>
                                                    </form>
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
        <!-- Content Row -->



    </div>
    <!-- /.container-fluid -->
@endsection
