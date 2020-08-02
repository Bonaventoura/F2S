@extends('frontend.layouts.frontend')

@section('slider_home')
    <div class="home_slider_container">

        <!-- Home Slider -->

        <div class="owl-carousel owl-theme home_slider mb-2">

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/financial.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>A new World is coming</h1>
                    <div class="home_slider_text">Donec vel ante rhoncus, posuere nulla quis, interdum nisi. Vestibulum laoreet lacinia diam, eget blandit sem gravida at.</div>

                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>A new World is coming</h1>
                    <div class="home_slider_text">Donec vel ante rhoncus, posuere nulla quis, interdum nisi. Vestibulum laoreet lacinia diam, eget blandit sem gravida at.</div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>A new World is coming</h1>
                    <div class="home_slider_text">Donec vel ante rhoncus, posuere nulla quis, interdum nisi. Vestibulum laoreet lacinia diam, eget blandit sem gravida at.</div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>A new World is coming</h1>
                    <div class="home_slider_text">Donec vel ante rhoncus, posuere nulla quis, interdum nisi. Vestibulum laoreet lacinia diam, eget blandit sem gravida at.</div>
                </div>
            </div>

        </div>

        <div class="home_slider_nav home_slider_prev d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('images/arrow_l.png') }}" alt=""></div>
        <div class="home_slider_nav home_slider_next d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('images/arrow_r.png') }}" alt=""></div>

    </div>
@endsection

@section('main')
    <!-- Intro -->

	<div class="intro bg-dark text-white mt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
                    <div class="intro_image text-lg-right text-center"><img src="{{ asset('images/logo_f2s.png') }}" alt=""></div>
				</div>
				<div class="col-lg-6">
					<div class="intro_content text-white">
						<div class="intro_title_container">
							<div class="intro_subtitle">Fonds Solidarité Start-up</div>
						</div>
						<div class="intro_text">
                            <img src="{{ asset('images/proccess/1.png') }}" width="600" alt="">
						</div>

                        <div class="intro_text">
                            <img src="{{ asset('images/proccess/2.png') }}" width="600" height="400" alt="">
                        </div>
                        <div class="link_button intro_button"><a href="#">Nous découvrir plus</a></div>
					</div>
                </div>
                <div class="col-lg-12 center">

                </div>
			</div>
		</div>
    </div>

	<!-- Services -->

	<div class="services">
		<div class="container">
            <div class="col-lg-12">
                <h2 class="text-center btn btn-block btn-primary">NOS SERVICES</h2>
            </div>
			<div class="row">
				<div class="col">
					<!-- Testimonials Slider -->

					<div class="services_slider_container">
						<div class="owl-carousel owl-theme services_slider">

							<!-- Services Item -->
							<div class="owl-item">
								<div class="services_item d-flex flex-column align-items-center justify-content-center">
									<div class="services_item_bg"></div>
									<div class="services_icon"><img class="svg" src="images/pub.png" alt=""></div>
									<div class="services_title">Exchange Fiat for Crypto</div>
									<p class="services_text">Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
									<div class="services_link"><a href="#">Read More</a></div>
								</div>
							</div>

							<!-- Services Item -->
							<div class="owl-item">
								<div class="services_item d-flex flex-column align-items-center justify-content-center">
									<div class="services_item_bg"></div>
									<div class="services_icon"><img class="svg" src="images/services_2.svg" alt=""></div>
									<div class="services_title">Exchange Fiat for Crypto</div>
									<p class="services_text">Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
									<div class="services_link"><a href="#">Read More</a></div>
								</div>
							</div>

							<!-- Services Item -->
							<div class="owl-item">
								<div class="services_item d-flex flex-column align-items-center justify-content-center">
									<div class="services_item_bg"></div>
									<div class="services_icon"><img class="svg" src="images/services_3.svg" alt=""></div>
									<div class="services_title">Exchange Fiat for Crypto</div>
									<p class="services_text">Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
									<div class="services_link"><a href="#">Read More</a></div>
								</div>
							</div>

							<!-- Services Item -->
							<div class="owl-item">
								<div class="services_item d-flex flex-column align-items-center justify-content-center">
									<div class="services_item_bg"></div>
									<div class="services_icon"><img class="svg" src="images/services_1.svg" alt=""></div>
									<div class="services_title">Exchange Fiat for Crypto</div>
									<p class="services_text">Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
									<div class="services_link"><a href="#">Read More</a></div>
								</div>
							</div>

							<!-- Services Item -->
							<div class="owl-item">
								<div class="services_item d-flex flex-column align-items-center justify-content-center">
									<div class="services_item_bg"></div>
									<div class="services_icon"><img class="svg" src="images/services_2.svg" alt=""></div>
									<div class="services_title">Exchange Fiat for Crypto</div>
									<p class="services_text">Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
									<div class="services_link"><a href="#">Read More</a></div>
								</div>
							</div>

							<!-- Services Item -->
							<div class="owl-item">
								<div class="services_item d-flex flex-column align-items-center justify-content-center">
									<div class="services_item_bg"></div>
									<div class="services_icon"><img class="svg" src="images/services_3.svg" alt=""></div>
									<div class="services_title">Exchange Fiat for Crypto</div>
									<p class="services_text">Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
									<div class="services_link"><a href="#">Read More</a></div>
								</div>
							</div>

						</div>

						<div class="services_nav services_prev d-flex flex-column align-items-center justify-content-center"><img src="images/arrow_l.png" alt=""></div>
						<div class="services_nav services_next d-flex flex-column align-items-center justify-content-center"><img src="images/arrow_r.png" alt=""></div>

					</div>

				</div>
			</div>
		</div>
    </div>

	<!-- Converter -->

	<div class="converter">
		<div class="converter_background parallax-window" data-parallax="scroll" data-image-src="images/converter.jpg" data-speed="0.8"></div>

		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="converter_content">
						<div class="converter_title_container">
							<div class="converter_subtitle">take a look at our</div>
							<h4 class="converter_title">Bitcoin To Fiat Currency Calculator</h4>
						</div>
						<div class="converter_text">
							<img src="{{ asset('images/pub_pme.jpg') }}" width="500" height="300" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="converter_content">
                        <div class="converter_title_container">
							<div class="converter_subtitle">take a look at our</div>
							<h4 class="converter_title">Bitcoin To Fiat Currency Calculator</h4>
						</div>
						<div class="converter_text">
							<img src="{{ asset('images/leve_fond.png') }}" width="500" height="300" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Info -->

	<div class="info">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">take a look at our</div>
						<div class="section_title">A simple trading system</div>
					</div>
				</div>
			</div>
			<div class="row info_row">

				<!-- Info Item -->
				<div class="col-lg-4 info_col">
					<div class="info_item text-center">
						<div class="info_image"><img src="images/info_1.png" alt=""></div>
						<div class="info_title">Create your wallet</div>
						<div class="info_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris.</p>
						</div>
					</div>
				</div>

				<!-- Info Item -->
				<div class="col-lg-4 info_col">
					<div class="info_item text-center">
						<div class="info_image"><img src="images/info_2.png" alt=""></div>
						<div class="info_title">Make payments</div>
						<div class="info_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris.</p>
						</div>
					</div>
				</div>

				<!-- Info Item -->
				<div class="col-lg-4 info_col">
					<div class="info_item text-center">
						<div class="info_image"><img src="images/info_3.png" alt=""></div>
						<div class="info_title">Buy or sell orders</div>
						<div class="info_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- News -->

	<div class="news bg-secondary">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">take a look at our</div>
						<div class="section_title">Latest News in Crypto</div>
					</div>
				</div>
			</div>
			<div class="row news_row">

				<!-- News Item -->
				<div class="col-lg-4 news_col">
					<div class="news_item">
						<div class="news_image">
							<img src="images/flayers.png" alt="https://unsplash.com/@silverhousehd">
						</div>

					</div>
				</div>

				<!-- News Item -->
				<div class="col-lg-4 news_col">
					<div class="news_item">
						<div class="news_image">
							<img src="images/flayers.png" alt="https://unsplash.com/@silverhousehd">
						</div>

					</div>
				</div>

				<!-- News Item -->
				<div class="col-lg-4 news_col">
					<div class="news_item">
						<div class="news_image">
							<img src="images/pub.png" alt="https://unsplash.com/@silverhousehd">
						</div>

					</div>
				</div>

			</div>
		</div>
    </div>

@endsection
