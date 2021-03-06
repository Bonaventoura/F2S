
<!DOCTYPE html>
<html lang="fr">
<head>
<title>Fonds Solidarité Startup (F2S)</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="F2S project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('plugin/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">

{{--<link rel="stylesheet" type="text/css" href="{{ asset('styles/financial.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/financial_responsive.css') }}">--}}
</head>
<body>

<div class="super_container">

	<!-- Home -->

	<div class="home">

		@yield('slider_home')

		<!-- Header -->

		@include('frontend.layouts.header')

	</div>

	@yield('main')

	<!-- Footer -->

	@include('frontend.layouts.footer')
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugin/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugin/easing/easing.js') }}"></script>
<script src="{{ asset('plugin/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
