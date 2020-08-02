
<!doctype html>
<html class="no-js"home/ lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>F2S</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>

<body>


    <!-- header-start -->
    @include('layouts.header')
    <!-- header-end -->

    <!-- slider_area_start -->
    @yield('slider')
    
    <!-- slider_area_end -->

    @yield('content')

    <!-- footer_start  -->
    @include('layouts.footer')
    <!-- footer_end  -->

    <!-- JS here -->
    <script src="{{ asset('js/home/vendor/modernizr-3.5.0.min.js') }}"/></script>
    <script src="{{ asset('js/home/vendor/jquery-1.12.4.min.js') }}"/></script>
    <script src="{{ asset('js/home/popper.min.js') }}"/></script>
    <script src="{{ asset('js/home/bootstrap.min.js') }}"/></script>
    <script src="{{ asset('js/home/owl.carousel.min.js') }}"/></script>
    <script src="{{ asset('js/home/isotope.pkgd.min.js') }}"/></script>
    <script src="{{ asset('js/home/ajax-form.js') }}"/></script>
    <script src="{{ asset('js/home/waypoints.min.js') }}"/></script>
    <script src="{{ asset('js/home/jquery.counterup.min.js') }}"/></script>
    <script src="{{ asset('js/home/imagesloaded.pkgd.min.js') }}"/></script>
    <script src="{{ asset('js/home/scrollIt.js') }}"/></script>
    <script src="{{ asset('js/home/jquery.scrollUp.min.js') }}"/></script>
    <script src="{{ asset('js/home/wow.min.js') }}"/></script>
    <script src="{{ asset('js/home/gijgo.min.js') }}"/></script>
    <script src="{{ asset('js/home/nice-select.min.js') }}"/></script>
    <script src="{{ asset('js/home/jquery.slicknav.min.js') }}"/></script>
    <script src="{{ asset('js/home/jquery.magnific-popup.min.js') }}"/></script>
    <script src="{{ asset('js/home/plugins.js') }}"/></script>
    <script src="{{ asset('js/home/main.js') }}"/></script>

    <script src="{{ asset('js/home/contact.js') }}"/></script>
    <script src="{{ asset('js/home/jquery.ajaxchimp.min.js') }}"/></script>
    <script src="{{ asset('js/home/jquery.form.js') }}"/></script>
    <script src="{{ asset('js/home/jquery.validate.min.js') }}"/></script>
    <script src="{{ asset('js/home/mail-script.js') }}"/></script>






    <!-- Modal -->
    <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="serch_form">
                <input type="text" placeholder="search" >
                <button type="submit">search</button>
            </div>
          </div>
        </div>
    </div>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-calendar-o"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-calendar-o"></span>'
            }

        });
    </script>
</body>

</html>
