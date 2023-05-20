@yield('head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logoPsd.png" alt="Mecano" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
{{--                        <x-slot name="content">--}}
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
{{--                    </x-slot>--}}
                    </span>

                </div>
            </li>

            {{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">--}}
{{--                    <i class="fas fa-th-large"></i>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
            <img src="dist/img/logoPsd.png" alt="logoPsd" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Mécano</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/fond.jpg" class="fond" alt="fond">
                </div>
                <div class="info">

                    <a href="{{route('home')}}" class="d-block"> {{Auth::user()->name }} </a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                        <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link">
                                    <i class="nav-icon fa fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>

                        @role("admin")
                            <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-calendar-alt"></i>
                                        <p>
                                            Rendez-Vous
                                        </p>
                                    </a>
                            </li>
                        @endrole

                        <li class="nav-item">
                            <a href="{{route('professionnelVehiculeList')}}" class="nav-link">
                                <i class="fa-regular fa fa-car-side"></i>
                                <p>
                                    Gestion Professionnel
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('usagerList')}}" class="nav-link">
                                <i class="fa-solid fa fa-handshake"></i>
                                <p>
                                    Gestion Usager
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('offreList')}}" class="nav-link">
                                <i class="fa-solid fa fa-comments-dollar"></i>
                                <p>
                                    Gestion Offre
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('typeDemandeList')}}" class="nav-link">
                                <i class="fa-solid fa fa-lock"></i>
                                <p>
                                    Gestion TypeDemande
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('demandeList')}}" class="nav-link">
                                <i class="fa-solid fa fa-sitemap"></i>
                                <p>
                                    Gestion Demande
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('garageList')}}" class="nav-link">
                                <i class="fa-solid fa fa-warehouse"></i>
                                <p>
                                    Gestion Garage
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('noterList')}}" class="nav-link">
                                <i class="fa-regular fa fa-notes-medical"></i>
                                <p>
                                    Gestion des Notes
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('carte')}}" class="nav-link">
                                <i class="fa-solid fa fa-map"></i>
                                <p>
                                    Gestion LocalisationGarage
                                </p>
                            </a>
                        </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

@yield('wrap')
{{--    <div class="content-wrapper">--}}
        @yield('content')
{{--    </div>--}}


    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Mémoire &Map; 2021-2022 <a href="#"> Cheikh Marr </a>.</strong>
    </footer>
    <!-- /.footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@yield('script')

</body>
</html>
