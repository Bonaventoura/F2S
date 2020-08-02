<header>
    <div class="header-area ">
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-md-5 ">
                        <div class="header_left">
                            
                            <b>
                                <?php

                                    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                                    echo strftime('%A, le %d %B %Y | Heure : %I:%M'). '<br>';

                                ?>
                            </b>
                        </div>
                    </div>
                    <div class="col-xl-7 col-md-7">
                        <div class="header_right d-flex justify-content-end">
                            <a href="#" class="boxed-btn3">Get a Quote</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="address_bar d-none d-lg-block">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="images/logo_f2s.png" width="100" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="address_menu d-flex justify-content-end">
                            <div class="single_address  d-flex">
                                <div class="icon">
                                    <img src="img/icon/header-address.svg" alt="">
                                </div>
                                <div class="address_info">
                                    <h3>Address</h3>
                                    <p>20/D, Kings road, Green lane</p>
                                </div>
                            </div>
                            <div class="single_address d-flex">
                                <div class="icon">
                                    <img src="img/icon/headset.svg" alt="">
                                </div>
                                <div class="address_info">
                                    <h3>Call Us</h3>
                                    <p>+10 673 567 367</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="white_bg_bar">
                    <div class="row align-items-center">
                        <div class="col-12 d-lg-none">
                            <div class="logo ">
                                <a href="#">
                                    <img src="images/logo_f2s.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">Accueil</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li>
                                            <a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="project.html">project</a></li>
                                                <li><a href="elements.html">elements</a></li>
                                                <li><a href="project_details.html">project details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a class="" href="{{ route('foire.online') }}">Foire </a></li>
                                        <li><a class="" href="{{ route('shopping') }}">E-Shop </a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="Appointment d-flex justify-content-end">

                                <div class="dropdown ml-lg-7 dropdown-toggle" >
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="badge badge-number badge-danger " data-toggle="dropdown">{{ \Cart::getTotalQuantity()}}</span>
                                    <div class="dropdown-menu dropdown-menu-right list-style-none" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                                        @include('e-commerce.cart-drop')
                                    </div>
                                </div>


                                @guest

                                    <div>
                                        <a href="{{ route('login') }}" class="btn btn-xs btn-primary">
                                            <span class="fa fa-user"></span>Login
                                        </a>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;

                                    @if (Route::has('register'))
                                    <a href="{{ route('compte.create') }}" class="btn btn-xs btn-success">
                                        <span class="fa fa-user"></span>S'inscrire
                                    </a>
                                    @endif


                                @else

                                    <div class="dropdown ml-lg-5">
                                        <span class="dropdown-toggle no-caret" data-toggle="dropdown">
                                            <img class="avatar avatar-xs img-rounded" src="{{ asset('assets/img/avatar/1.jpg') }}" width="20" height="20" alt="user">
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <a class="dropdown-item" href="{{ route('espace.client') }}">Dashbord</a>
                                            <a class="dropdown-item" href="{{ route('boutiques.create') }}">Créer Boutique</a>
                                            {{--Afficher activer compte si le compte est inactif sinon ne rien afficher --}}


                                            <a class="dropdown-item" href="{{ route('activer.account') }}">Activer Compte</a>

                                            {{--fin si  --}}
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>

                                @endguest
                                {{-- /connexion --}}

                            </div>

                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
