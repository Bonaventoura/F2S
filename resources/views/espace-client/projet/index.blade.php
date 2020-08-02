@extends('espace-client.include')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"> Back Office | Projet Personnel</h1>
          <a href="{{ route('projets.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Create Projet</a>
        </div>

        <!-- Content Row -->


        <!-- Content Row -->

        <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Projet Personnel</h6>

              </div>
              <!-- Card Body -->
              <div class="card-body">

              </div>
            </div>
          </div>


        </div>


    </div>
    <!-- /.container-fluid -->

@endsection
