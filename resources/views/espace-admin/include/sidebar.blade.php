{{--}}
<aside class="main-sidebar bg-gradient-gray text-white elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('welcome') }}" class="brand-link navbar-warning">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">F2S </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-white">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('espace.admin') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview text-white">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Gestion des comptes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('activations.index') }}" class="nav-link text-white">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Activation Comptes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('accounts.index') }}" class="nav-link text-white">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste des Comptes</p>
                  </a>
                </li>

              </ul>
            </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Gestion des Clubs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('groupes.index') }}" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Création du club</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('clubs.critere') }}" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insertion des membres</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('clubs.index') }}" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etat des Clubs</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Projets</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link text-white">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Projets Clubs
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).on('click','ul li a ', function () {
        $(this).addClass('active').siblings().removeClass('active');
    })
</script>
--}}

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Gestion des Comptes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('activations.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Activation de comptes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('accounts.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status des comptes</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Gestion des Clubs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('groupes.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Création du Clubs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('clubs.critere') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insertion des membres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('clubs.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etat des clubs</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Projets</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script src="{{ asset('js/jquery.min.js') }}"></script>
{{--
<script>
    $(document).on('click','ul li a ', function () {
        $(this).addClass('active').siblings().removeClass('active');
    })
</script>
--}}
