
<!DOCTYPE html>
<html lang="en">
<head>
<title>Services</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Invest project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
<link href="plugin/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugin/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugin/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugin/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/services.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/services_responsive.css') }}">
</head>
<body>

<div class="super_container">
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/services_background.jpg') }}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_content_inner">
							<div class="home_title">Services de F2S</div>
							<div class="home_breadcrumbs">
								<ul>
									<li><a href="{{ route('welcome') }}">Accueil</a></li>
									<li>Services</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header -->

		@include('frontend.layouts.header')
	</div>
	
	@yield('content')

	<!-- Footer -->

	@include('frontend.layouts.footer')
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugin/greensock/TweenMax.min.js"></script>
<script src="plugin/greensock/TimelineMax.min.js"></script>
<script src="plugin/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugin/greensock/animation.gsap.min.js"></script>
<script src="plugin/greensock/ScrollToPlugin.min.js"></script>
<script src="plugin/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugin/easing/easing.js"></script>
<script src="plugin/parallax-js-master/parallax.min.js"></script>
<script src="js/about_custom.js"></script>
</body>
</html>