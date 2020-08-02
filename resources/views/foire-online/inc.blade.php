<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Marketing 1 — TheSaaS Sample Demo Landing Page</title>

    <!-- Styles -->
    <link href="{{ asset('/assets/css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('/assets/img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('/assets/img/favicon.png') }}">
  </head>

  <body>

    <!-- Navbar -->
        @include('layouts.navbar')
    <!-- /.navbar -->




   <!-- Header -->
   <header class="header text-white" style="background-image: linear-gradient(-225deg, rgb(11, 34, 68) 0%, rgb(133, 141, 189) 48%, rgb(44, 168, 110) 100%);">
    <div class="container text-center">

      <div class="row">
        <div class="col-md-8 mx-auto">

          <h1>{{$boutique->nom_boutique}}</h1>
          <p class="lead-2 opacity-90 mt-6">Tous ensemble, unissons nos forces pour aider la jeunesse dynamique</p>

        </div>
      </div>

    </div>
</header><!-- /.header -->


    <!-- Main Content -->


        @yield('page')





    <!--End Main Content -->


   <!-- Footer -->
   @include('layouts.footer')
   <!-- /.footer -->




  </body>
</html>
