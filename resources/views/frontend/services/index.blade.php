@extends('frontend.services.inc')

@section('content')
    <!-- Points -->

	<div class="points">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container">
						<div class="section_subtitle">Services F2S</div>
						<div class="section_title">Nos prestations</div>
					</div>
				</div>
			</div>
			<div class="row points_container">

				<!-- Service -->
				<div class="col-lg-4 col-md-6 point_col">
					<div class="point clearfix">
						<div class="point_image"><img src="{{ asset('images/services_1.png') }}" alt=""></div>
						<div class="point_content">
							<div class="point_title">Transferts d'argent</div>
							<div class="point_text">
                                <ul>
                                    <li>Transfert national</li>
                                    <li>Transfert international</li>
                                </ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 col-md-6 point_col">
					<div class="point clearfix">
						<div class="point_image"><img src="{{ asset('images/services_2.png') }}" alt=""></div>
						<div class="point_content">
							<div class="point_title">Microfinance</div>
							<div class="point_text">
								<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 col-md-6 point_col">
					<div class="point clearfix">
						<div class="point_image"><img src="{{ asset('images/services_3.png') }}" alt=""></div>
						<div class="point_content">
							<div class="point_title">Logistique</div>
							<div class="point_text">
								<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 col-md-6 point_col">
					<div class="point clearfix">
						<div class="point_image"><img src="{{ asset('images/services_4.png') }}" alt=""></div>
						<div class="point_content">
							<div class="point_title">Central d'achat</div>
							<div class="point_text">
								<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 col-md-6 point_col">
					<div class="point clearfix">
						<div class="point_image"><img src="{{ asset('images/services_5.png') }}" alt=""></div>
						<div class="point_content">
							<div class="point_title">Achat modéré</div>
							<div class="point_text">
								<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 col-md-6 point_col">
					<div class="point clearfix">
						<div class="point_image"><img src="{{ asset('images/services_6.png') }}" alt=""></div>
						<div class="point_content">
							<div class="point_title">Tourisme et Loisirs</div>
							<div class="point_text">
								<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris.</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Services -->

	<div class="services">
		<div class="services_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/services_background_2.jpg') }}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-row flex-wrap align-items-start justify-content-start">

					<!-- Service -->
					<div class="service">
						<div class="service_icon"><img src="{{ asset('images/service_1.svg') }}" class="svg" alt=""></div>
						<div class="service_title">Transport & Logistics Consulting</div>
						<div class="service_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
						</div>
						<div class="service_link"><a href="#">Read More</a></div>
					</div>

					<!-- Service -->
					<div class="service">
						<div class="service_icon"><img src="{{ asset('images/service_2.svg') }}" class="svg" alt=""></div>
						<div class="service_title">Complete Financial Planning</div>
						<div class="service_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
						</div>
						<div class="service_link"><a href="#">Read More</a></div>
					</div>

					<!-- Service -->
					<div class="service">
						<div class="service_icon"><img src="{{ asset('images/service_3.svg') }}" class="svg" alt=""></div>
						<div class="service_title">Safe & Secure Transactions</div>
						<div class="service_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
						</div>
						<div class="service_link"><a href="#">Read More</a></div>
					</div>

					<!-- Service -->
					<div class="service">
						<div class="service_icon"><img src="{{ asset('images/service_4.svg') }}" class="svg" alt=""></div>
						<div class="service_title">Private Internet Banking</div>
						<div class="service_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
						</div>
						<div class="service_link"><a href="#">Read More</a></div>
					</div>

					<!-- Service -->
					<div class="service">
						<div class="service_icon"><img src="{{ asset('images/service_5.svg') }}" class="svg" alt=""></div>
						<div class="service_title">Best Business Consulting</div>
						<div class="service_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
						</div>
						<div class="service_link"><a href="#">Read More</a></div>
					</div>

					<!-- Service -->
					<div class="service">
						<div class="service_icon"><img src="{{ asset('images/service_6.svg') }}" class="svg" alt=""></div>
						<div class="service_title">Consumer Products Consulting</div>
						<div class="service_text">
							<p>Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta s sem. Duis non volutpat arcu. Sed ut iaculis elit, quis varius mauris. Integer ut ultric ies orci, lobortis egesta.</p>
						</div>
						<div class="service_link"><a href="#">Read More</a></div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Call Back -->

	<div class="call">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="call_image"><img src="{{ asset('images/call.jpg') }}" alt=""></div>
				</div>
				<div class="col-lg-8">
					<div class="call_container">
						<div class="section_title_container">
							<div class="section_subtitle">take a look at our</div>
							<div class="section_title">Request a Call Back</div>
						</div>
						<div class="call_form_container">
							<form action="#" class="call_form">
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="input_item" placeholder="Your Name" required="required">
									</div>
									<div class="col-md-6">
										<input type="email" class="input_item" placeholder="Your E-mail" required="required">
									</div>
									<div class="col-md-6">
										<input type="text" class="input_item" placeholder="Your Phone">
									</div>
									<div class="col-md-6">
										<select class="dropdown_item input_item">
											<option>Business type</option>
											<option>Business type</option>
											<option>Business type</option>
										</select>
									</div>
									<div class="col-md-12">
										<button id="call_btn" type="submit" class="call_button trans_200" value="Submit">submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
