
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>F2S | Dashboard </title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('styles/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

    </head>


    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            @include('espace-admin.include.topbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('espace-admin.include.sidebar')
            <!-- /Main Sidebar Container -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">@yield('title') </h1>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="@yield('url')">@yield('title1')</a></li>
                                    <li class="breadcrumb-item active">@yield('title2') </li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- /.Main content -->
            </div>
            <!-- /.content-wrapper -->

            @include('espace-admin.include.footer')
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery-->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        <!-- page script -->
        <script>
        $(function () {
            $("#example1").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            });
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            });
        });
        </script>



    </body>
</html>
