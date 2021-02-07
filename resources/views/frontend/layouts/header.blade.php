<header class="header">

    <!-- Top Bar -->
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="top_bar_container d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container">
                            <div class="logo">

                                <a href="#">
                                    <div class="logo_line_1"><span>F2S</span></div>
                                    <div class="logo_line_2">Fonds Solidarité Startup</div>
                                    <div class="logo_img"><img src="{{ asset('images/logo_f2s.png') }}" width="100" alt=""></div>
                                </a>
                            </div>
                        </div>
                        <div class="center">
                            <b><?php

                                setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                                echo strftime('%A, le %d %B %Y | Heure : %I:%M'). '<br>';

                            ?></b>
                        </div>

                        <div class="top_bar_content ml-auto text-dark">
                            <div class="main_menu_phone"><img src="{{ asset('images/phone-call.svg') }}" alt=""><span>(+228) 92 55 68 92 </span></div>
                            <div class="main_menu_email"><img src="{{ asset('images/envelope.svg') }}" alt=""><span>info@f2s.com</span></div>

                        </div>
                        <div class="burger">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="main_menu">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="main_menu_container d-flex flex-row align-items-center justify-content-start">
                        <div class="main_menu_content">
                            <ul class="main_menu_list">
                                <li class="active hassubs"><a href="{{ route('welcome') }}">Accueil</a></li>
                                <li><a href="about.html">A Propos </a></li>
                                <li class="hassubs"><a href="{{ route('services') }}">services</a></li>


                                <li class="hassubs">
                                    <a href="#">Financial</a>
                                    <ul>
                                        <li>
                                            <a href="#">Financer F2S</a>
                                        </li>
                                        <li>
                                            <a href="#">Financez START-UP</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a class="" href="{{ route('foire.online') }}">Foire </a></li>
                                <li><a href="news.html">blog</a></li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </div>
                        <div class="main_menu_contact ml-auto">
                            @if (\Cart::getTotalQuantity() > 0)
                            <div class="dropdown ml-lg-7 " >
                                <span class="badge badge-number badge-danger " data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"></i>
                                    {{ \Cart::getTotalQuantity()}}</span>
                                <div class="dropdown-menu dropdown-menu-right list-style-none" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                                    @include('frontend.foire.cart-drop')
                                </div>
                            </div>
                            @endif

                        </div>

                        <div class="register_login ml-1 text-white">

                            @guest

                                <div class="login ">
                                    <a href="{{ route('login') }}" class="btn btn-xs btn-primary">
                                        <span class="fa fa-user"></span>Login
                                    </a>
                                </div>

                                @if (Route::has('register'))
                                    <div class="register">
                                        <a href="{{ route('compte.create') }}" class="btn btn-xs btn-success">
                                            <span class="fa fa-user"></span>S'inscrire
                                        </a>
                                    </div>
                                @endif


                            @else

                                <div class="dropdown ml-lg-5">
                                    <span class="dropdown-toggle no-caret" data-toggle="dropdown">
                                        <img class="avatar avatar-xs img-rounded" src="{{ asset('images/admin.png') }}" width="20" height="40" alt="user">
                                        <p class="text-white"> {{Auth::user()->name}} </p>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item" href="{{ route('espace.client') }}">Dashbord</a>

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
                </div>
            </div>
        </div>
    </div>



    <div class="menu">
        <div class="menu_register_login">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="menu_register_login_content d-flex flex-row align-items-center justify-content-end">
                            <div class="register"><a href="#">register</a></div>
                            <div class="login"><a href="#">login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="menu_list">
            <li class="menu_item">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="#">Accueil</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="menu_item">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="about.html">A propos</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="menu_item">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="listings.html">services</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="menu_item">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="news.html">portfolio</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="menu_item">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="contact.html">blog</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="menu_item">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="contact.html">contact</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
