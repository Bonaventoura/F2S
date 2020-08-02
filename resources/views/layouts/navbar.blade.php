

<nav class="navbar navbar-expand-lg navbar-white navbar-stick-white" data-navbar="sticky">
    <div class="container ">

      <div class="navbar-left">
        <button class="navbar-toggler" type="button">&#9776;</button>
        <a class="navbar-brand" href="{{ route('welcome') }}">
          <img class="logo-dark" src="{{ asset('/assets/img/logo-dark.png') }}" alt="logo">
          <img class="logo-light" src="{{ asset('/assets/img/logo-light.png') }}" alt="logo">
        </a>
      </div>

      <section class="navbar-mobile">
        <span class="navbar-divider d-mobile-none"></span>

        <ul class="nav nav-navbar">
            <li class="nav-item">
                <a class="nav-link" href="#">A-Propos <span class="arrow"></span></a>
                    <ul class="nav">

                        <li class="nav-item">
                            <a class="nav-link" href="#">SaaS <span class="arrow"></span></a>
                            <nav class="nav">
                                <a class="nav-link" href="../demo/saas-1.html">SaaS 1</a>
                                <a class="nav-link" href="../demo/saas-2.html">SaaS 2</a>
                                <a class="nav-link" href="../demo/saas-3.html">SaaS 3</a>
                                <a class="nav-link" href="../demo/saas-4.html">SaaS 4</a>
                            </nav>
                        </li>

                    </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('foire.online') }}">Foire Online <span class="arrow"></span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('shopping') }}">E-Cormmerce <span class="arrow"></span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('activer.account') }}">Activer Compte <span class="arrow"></span></a>
            </li>


            @auth


                <li class="nav-item">
                    <a class="nav-link" href="#">Club <span class="arrow"></span></a>
                    <nav class="nav">
                    <a class="nav-link" href="../shop/list.html">Crowfounding</a>
                    <a class="nav-link" href="../shop/item.html">Comptabilité</a>
                    </nav>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('espace.client') }}">Mon Dashbord <span class="arrow"></span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Boutique <span class="arrow"></span></a>
                    <nav class="nav">
                    <a class="nav-link" href="{{ route('boutiques.create') }}">Créer Boutique</a>
                    <a class="nav-link" href="../shop/item.html">Ma Boutique</a>
                    </nav>
                </li>


            @endauth

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                   href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"
                >
                    <span class="badge badge-pill badge-dark">
                        <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                    <ul class="list-group" style="margin: 20px;">
                        @include('e-commerce.cart-drop')
                    </ul>

                </div>
            </li>

        </ul>
      </section>

        @guest
            <li class="nav-item" style="list-style: none">
                <nav class="nav">
                    <a class="btn btn-xs btn-round btn-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                </nav>

            </li>
            &nbsp;&nbsp;
            @if (Route::has('register'))

                <li class="nav-item" style="list-style: none">
                    <nav class="nav">
                        <a class="btn btn-xs btn-round btn-primary" href="{{ route('compte.create') }}">Register</a>
                    </nav>

                </li>
            @endif
        @else
                <li class="nav-item " style="list-style: none">
                    <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre style="text-decoration: none">
                        <button class="btn btn-xs btn-round ">
                            @if (isset($pseudo))
                                {{$pseudo}}
                            @else
                                Login
                            @endif

                        </button>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="#">
                            Mon profile
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </div>

                </li>
        @endguest


        <ul class="nav nav-navbar ml-auto" style="list-style: none">
            <li class="nav-item " style="list-style: none">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-pill badge-dark">
                        <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                    <ul class="list-group" style="margin: 20px;">
                        @include('e-commerce.cart-drop')
                    </ul>

                </div>
            </li>
        </ul>

    </div>
</nav>
