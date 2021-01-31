
<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('page_title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="F2S">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('plugin/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news_responsive.css') }}">
<link href="{{ asset('styles/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

<div class="super_container">

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="@yield('img-src')" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_content_inner">
							<div class="home_title">@yield('page')</div>
							<div class="home_breadcrumbs">
								<ul>
									<li><a href="{{ route('welcome') }}">Accueil</a></li>
									<li>@yield('route')</li>
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

	<!-- News -->

	@yield('content')

	<!-- Footer -->

	@include('frontend.layouts.footer')
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugin/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('plugin/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('plugin/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('plugin/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('plugin/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('plugin/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugin/easing/easing.js') }}"></script>
<script src="{{ asset('plugin/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/news_custom.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
