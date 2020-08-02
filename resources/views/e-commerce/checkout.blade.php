@extends('e-commerce.frontend')

@section('page')

    <!-- Main Content -->
    <main class="main-content">

        <section class="section">
            <div class="container">

                <form class="row gap-y">

                    <div class="col-lg-8">

                        <table class="table table-cart">

                            <tbody valign="middle">

                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <a class="item-remove" href="#"><i class="ti-close"></i></a>
                                        </td>

                                        <td>
                                            <a href="item.html">
                                            <img class="rounded" src="/storage/produits/{{$item->attributes->image}}" alt="...">
                                            </a>
                                        </td>

                                        <td>
                                            <h5>{{$item->name}}</h5>
                                        </td>

                                        <td>
                                            <h5> {{$item->quantity}} </h5>
                                        </td>



                                        <td>
                                            <h4 class="price"> {{ \Cart::get($item->id)->getPriceSum() }} FCFA</h4>
                                        </td>


                                    </tr>

                                @endforeach

                            </tbody>
                        </table>



                        <hr class="my-8">

                        <h5 class="mb-6">Shipping Address</h5>

                    </div>


                    <div class="col-lg-4">
                        <div class="cart-price">
                            <div class="flexbox">
                                <div>
                                    <p><strong>Total produits:</strong></p>
                                </div>

                                <div>
                                    @if(\Cart::getTotalQuantity()>0)
                                        {{ \Cart::getTotalQuantity()}} Product(s) In Your Cart<br>
                                    @else
                                        <h4>No Product(s) In Your Cart</h4><br>
                                        <a href="/shopping" class="btn btn-dark">Continue Shopping</a>
                                    @endif
                                </div>
                            </div>
                            <hr>

                            <div class="flexbox">
                                <div>

                                    <p><strong>Shipping:</strong></p>
                                    <p><strong>Tax (%10):</strong></p>
                                </div>

                                <div>

                                </div>
                            </div>

                        <hr>

                            <div class="flexbox">
                                <div>
                                    <p><strong>Total:</strong></p>
                                </div>

                                <div>
                                    <p class="fw-600">{{ \Cart::getTotal() }} FCFA</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>

                <div class="row col-6">

                    {{--
                    <form action="#" method="post">

                        <div class="form-row">
                            {{--
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" placeholder="First name">
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" placeholder="Last name">
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" placeholder="Email Address">
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" placeholder="Phone Number">
                            </div>

                            <div class="col-md-6 form-group">
                                <select class="form-control">
                                    <option>Country</option>
                                    <option>United States</option>
                                </select>
                            </div>


                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" placeholder="City">
                            </div>


                            <div class="col-12 form-group">
                                <input class="form-control" type="text" placeholder="Address Line 1">
                            </div>
                            --

                            <div id="card-element">

                            </div>

                            <div id="card-errors"></div>

                            <button type="submit" id="submit" class="btn btn-block btn-success">Proceder au payement</button>




                        </div>
                    </form> --}}

                    <div class="cheque">

						<div class="logos">
							<a href="#" class="logos-item">
								<img src="img/visa.png" alt="Visa">
							</a>
							<a href="#" class="logos-item">
								<img src="img/mastercard.png" alt="MasterCard">
							</a>
							<a href="#" class="logos-item">
								<img src="img/discover.png" alt="DISCOVER">
							</a>
							<a href="#" class="logos-item">
								<img src="img/amex.png" alt="Amex">
							</a>

							<span style="float: right;">
                                <form action="/" method="POST">

                                    <label for="">Nom </label>
                                    <input type="text" name="" id="" class="form-control">
									  <script
									    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
									    data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
									    data-amount="999"
									    data-name="Stripe.com"
									    data-description="Widget"
									    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
									    data-locale="auto"
									    data-zip-code="true">
									  </script>
								</form>
							</span>
						</div>
					</div>
                </div>



            </div>
        </section>

    </main>


@endsection


