@extends('frontend.layouts.frontend')

@section('slider_home')
    <div class="home_slider_container">

        <!-- Home Slider -->

        <div class="owl-carousel owl-theme home_slider mb-2">

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/frontend/fond_6.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>Fonds Solidarité Startup</h1>
                    <div class="home_slider_text">
						Finance vos projets
					</div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/frontend/fond_9.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>Nous finançons votre avenir</h1>
                    <div class="home_slider_text">Relever les grands défis de votre avenir, c’est vous inscrire aujourd’hui même au programme F2S</div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/frontend/fond_11.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>Le futur se prépare maintenant </h1>
                    <div class="home_slider_text">
						Jeunes sans emploi, forçons l’avenir à vous réserver une place dans la société.
						Et ceci à travers notre détermination et notre dure labeur 
					</div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item">
                <div class="slider_background" style="background-image:url(images/frontend/fond_12.jpg)"></div>
                <div class="home_slider_content text-center">
                    <h1>l’Avenir c’est de la prévoyance</h1>
                    <div class="home_slider_text">
						L’Avenir est un évènement à double tranchant,
						Il est rose pour ceux qui le préparent aujourd’hui
						et amer pour ceux qui le rêvent rose sans pour autant le préparer.
					</div>
                </div>
            </div>

        </div>

        <div class="home_slider_nav home_slider_prev d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('images/arrow_l.png') }}" alt=""></div>
        <div class="home_slider_nav home_slider_next d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('images/arrow_r.png') }}" alt=""></div>

    </div>
@endsection

@section('main')
    <!-- Intro -->

	<div class="intro  text-white mt-5">
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
                            <img src="{{ asset('images/fontend/11.jpg') }}" width="600" alt="">
						</div>

                        <div class="intro_text">
                            <img src="{{ asset('images/frontend/12.jpg') }}" width="600" height="400" alt="">
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
            <div class="col-lg-12 mt-3">
                <h2 class="text-center btn btn-block btn-primary">LES AVANTAGES LIÉS A VOTRE ADHÉSION AU PROGRAMME F2S</h2>
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
									<div class="services_title">Renforcement de capacité</div>
									
									<ul class="list-group">
										.<li class="list-group-item active">Formation théorique et pratique de haut niveau en entrepreunariat</li>
										.<li class="list-group-item active">Formation sur la rédaction du plan d'affaire</li>
										.<li class="list-group-item active">Formation continue en motivation, éducation financière, développement personnel et coaching entrepreunarial après obtention du financement </li>
									</ul>
									
									
								</div>
							</div>

							<!-- Services Item -->
							<div class="owl-item">
								<div class="services_item d-flex flex-column align-items-center justify-content-center">
									<div class="services_item_bg"></div>
									<div class="services_icon"><img class="svg" src="images/services_2.svg" alt=""></div>
									<div class="services_title">Accompagnement des projets</div>
									<ul class="list-group">
										.<li class="list-group-item active">Financement des projets soumis et assistance technique dans la réalisation du projet</li>
										.<li class="list-group-item active">Suivie du remboursement des financements obtenus</li>
										.<li class="list-group-item active">Montage des dossiers de refinancement d'autres projets</li>
										.<li class="list-group-item active">Bénéficier d'un financement crownfunding</li>
									</ul>
								</div>
							</div>

							<!-- Services Item -->
							<div class="owl-item">
								<div class="services_item d-flex flex-column align-items-center justify-content-center">
									<div class="services_item_bg"></div>
									<div class="services_icon"><img class="svg" src="images/services_3.svg" alt=""></div>
									<div class="services_title">Les accès sur la plateforme</div>
									.<li class="list-group-item active">Disposer d'un back-office accessible à tous</li>
									.<li class="list-group-item active">Disposer d'un espace de boutique vitrine</li>
									.<li class="list-group-item active">Disposition d'un back-office accessible à tous</li>
									.<li class="list-group-item active">Service logistique ou de livarison disponible pour les adhérents</li>
									.<li class="list-group-item active">Exposition et vente de vos produits et services sur la plateforme</li>
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
		<div class="converter_background parallax-window" data-parallax="scroll" data-image-src="images/leve_fond.png" data-speed="0.8"></div>

		<div class="container">
			<div class="row">
				
				<div class="col-lg-6">
					<div class="converter_content">
                        <div class="converter_title_container">
							<div class="converter_subtitle"></div>
							<h4 class="converter_title"></h4>
						</div>
						<div class="converter_text">
							{{--<img src="{{ asset('images/leve_fond.png') }}" width="500" height="300" alt="">--}}
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
						<div class="section_subtitle"></div>
						<div class="section_title">Nos partenaires</div>
					</div>
				</div>
			</div>
			<div class="row info_row">

				<!-- Info Item -->
				<div class="col-lg-3 info_col">
					<div class="info_item text-center">
						<div class="info_image"><img src="images/info_1.png" alt=""></div>
						<div class="info_title">FAIEJ</div>
						<div class="info_text">
							<p></p>
						</div>
					</div>
				</div>

				<!-- Info Item -->
				<div class="col-lg-3 info_col">
					<div class="info_item text-center">
						<div class="info_image"><img src="images/info_2.png" alt=""></div>
						<div class="info_title">OTR</div>
						<div class="info_text">
							<p></p>
						</div>
					</div>
				</div>

				<!-- Info Item -->
				<div class="col-lg-3 info_col">
					<div class="info_item text-center">
						<div class="info_image"><img src="images/info_3.png" alt=""></div>
						<div class="info_title">PND</div>
						<div class="info_text">
							<p></p>
						</div>
					</div>
				</div>

				<!-- Info Item -->
				<div class="col-lg-3 info_col">
					<div class="info_item text-center">
						<div class="info_image"><img src="images/info_3.png" alt=""></div>
						<div class="info_title">ONU</div>
						<div class="info_text">
							<p></p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- News -->

	<div class="news " >
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle"></div>
						<div class="section_title"></div>
					</div>
				</div>
			</div>
			<div class="row news_row" >

				<!-- News Item -->
				<div class="col-lg-6 news_col">
					<div class="news_item">
						<div class="news_image">
							<img src="images/frontend/13.jpg" alt="https://unsplash.com/@silverhousehd">
						</div>

					</div>
				</div>


				<!-- News Item -->
				<div class="col-lg-6 news_col">
					<div class="news_item">
						<div class="news_image">
							<img src="images/frontend/15.jpg" alt="https://unsplash.com/@silverhousehd">
						</div>

					</div>
				</div>

			</div>
		</div>
    </div>

@endsection
