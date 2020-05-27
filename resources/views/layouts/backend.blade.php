<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Portfolio with bootstrap">
    <meta name="author" content="Mateusz Kałwiński">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>


    <link rel="icon" href="{{asset('images/logo.png')}} ">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('components/material/css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('components/material/css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('components/material/css/style.css')}}">
    <!-- SLICK (optional) -->
    <link rel="stylesheet" type="text/css" href="{{asset('components/slick-1.8.1/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('components/slick-1.8.1/slick/slick-theme.css')}}"/>
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('components/material/css/addons/datatables.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('components/material/css/addons/datatables-select.min.css')}}"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script>
        var base_url = '{{ url('/admin') }}';
    </script>

</head>
<body class="fixed-sn indigo-skin">

<!--Double navigation-->
<header class="position-relative h-auto">
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
        <ul class="custom-scrollbar">
            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
                </div>
            </li>
            <!--/. Logo -->
            <!--Social-->
            <li>
                <ul class="social">
                    <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a></li>
                    <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
                    <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>
                    <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li>
                </ul>
            </li>
            <!--/Social-->
            <!--Search Form-->
            <li>
                <form class="search-form" role="search">
                    <div class="form-group md-form mt-0 pt-1 waves-light">
                        <input type="text" class="form-control" placeholder="Szukaj">
                    </div>
                </form>
            </li>
            <!--/.Search Form-->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">

                    @if( Auth::user()->hasRole(['admin']) )
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user-shield"></i>Admin<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class="waves-effect">Statystyki</a>
                                    </li>
                                    <li><a href="{{route('adminUsers')}}" class="waves-effect">Użytkownicy</a>
                                    </li>
                                    <li><a href="{{route('adminShelterApplication')}}" class="waves-effect">Zgłoszenia schronisk</a>
                                    </li>
                                    <li><a href="{{route('adminViolationReports')}}" class="waves-effect">Zgłoszenia naruszeń</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Lokalizacje</a>
                                    </li>
                                    <li><a href="{{route('adminSpecies')}}" class="waves-effect">Gatunki</a>
                                    </li>
                                    <li><a href="{{route('adminBreeds')}}" class="waves-effect">Rasy</a>
                                    </li>
                                    <li><a href="{{route('adminAnimals')}}" class="waves-effect">Zwierzaki</a>
                                    </li>
                                    <li><a href="{{route('adminAnimalCharacteristics')}}" class="waves-effect">Cechy zwierzaków</a>
                                    </li>
                                    <li><a href="{{route('adminAnimalColors')}}" class="waves-effect">Kolory zwierzaków</a>
                                    </li>
                                    <li><a href="{{route('adminAnimalFur')}}" class="waves-effect">Długość futra zwierzaków</a>
                                    </li>
                                    <li><a href="{{route('adminAnimalSize')}}" class="waves-effect">wielkość zwierzaków</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    @endif
                    <li><a href="{{route('adminHome')}}" class="collapsible-header waves-effect arrow-r"><i class="fas fa-user"></i>Strona główna</a>
                    </li>
                    <li><a href="{{route('adminHome')}}" class="collapsible-header waves-effect arrow-r text-decoration-none"><i class="fas fa-dog"></i>Dodane zwierzaki</a>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-plus"></i>
                            Dodaj zwierzaka</a>
                    </li>
                    <li><a href="{{route('favourite')}}" class="collapsible-header waves-effect arrow-r"><i class="fas fa-heart"></i>
                            Ulubione</a>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-envelope"></i>
                            Wiadomości</a>
                    </li>
                    @if( Auth::user()->hasRole(['shelter']) )
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-home"></i> Schronisko<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#" class="waves-effect">Edytuj schronisko</a>
                                </li>
                                <li><a href="#" class="waves-effect">Dodaj artykuł</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-cogs"></i>Ustawienia<i
                                class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{route('profile')}}" class="waves-effect">Dane osobowe</a>
                                </li>
                                <li><a href="#" class="waves-effect">Zmiana hasła</a>
                                </li>
                                <li><a href="#" class="waves-effect">Pomoc</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212121 !important;">
        <div class="container ">
            <a class="navbar-brand" href="{{route('home')}}"><strong>Idogo</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav w-100 position-relative justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('animals')}}">Zwierzęta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('shelters')}}">Schroniska</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Adopcja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Artukuły</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('breeds')}}">Rasy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('joinShelter')}}">Dodaj schronisko</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    @guest()
                        <i class="far fa-2x fa-user-circle text-muted my-auto"></i>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Zaloguj</a></li>
                        <span class="text-white my-auto">/</span>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Zarejestruj</a></li>
                    @endguest

                    @auth()
                        <li class="nav-item avatar dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdownMenuLink-55"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <div>
                                    <img class="rounded-circle menu-profile-image profile-image-size" src="{{Auth::user()->photos[0]['path'] ?? $placeholderUser}}">
                                    {{--                                        <img class="rounded-circle menu-profile-image" src="{{Auth::user()->photos[0]['path'] ?? $placeholderUser}}">--}}
                                </div>
                                <div class="ml-2 mr-2">
                                    <p class="nav-item mb-0">{{ Auth::user()->FullName }}</p>
                                    <small class="nav-item">{{ Auth::user()->email }}</small>
                                </div>
                                <i class="fas fa-angle-down"></i>
                            </a>


                            <div class="dropdown-menu dropdown-dark mt-1 border-none z-depth-1"
                                 aria-labelledby="navbarDropdownMenuLink-55">
                                <a class="dropdown-item" href="{{ route('adminHome') }}">Mój profil</a>
                                <a class="dropdown-item" href="{{ route('adminHome') }}">Dodaj zwierzaka</a>
                                <a class="dropdown-item" href="{{ route('adminHome') }}">Ustawienia</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    Wyloguj
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
    <!-- /.Navbar -->
</header>
<main class="pt-5">
    @yield('content')
</main>



<!-- Footer -->
<footer class="page-footer font-small elegant-color-dark pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">Znajdź nas na: </h5>
                <div class="d-flex flex-row">
                    <button
                        class="btn indigo lighten-1 btn-rounded text-white pl-4 pr-4 waves-effect waves-light text-transform-none">
                        <i class="fab fa-lg fa-facebook-square mr-3"></i> Facebook
                    </button>
                    <button
                        class="btn indigo lighten-1 btn-rounded text-white pl-4 pr-4 waves-effect waves-light text-transform-none">
                        <i class="fab fa-lg fa-instagram mr-3"></i> Instagram
                    </button>
                    <button
                        class="btn indigo lighten-1 btn-rounded text-white pl-4 pr-4 waves-effect waves-light text-transform-none">
                        <i class="fab fa-lg fa-twitter-square mr-3"></i> Twitter
                    </button>
                </div>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Idogo</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Pomoc</a>
                    </li>
                    <li>
                        <a href="#!">Kontakt</a>
                    </li>
                    <li>
                        <a href="#!">Polityka prywatności</a>
                    </li>
                    <li>
                        <a href="#!">Polityka plików "cookies"</a>
                    </li>
                    <li>
                        <a href="#!">Regulamin Idogo</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">O nas</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Dodatkowe informacje</a>
                    </li>
                    <li>
                        <a href="#!">Blog</a>
                    </li>
                    <li>
                        <a href="#!">Mapa kategori</a>
                    </li>
                    <li>
                        <a href="#!">Mapa miejscowości</a>
                    </li>
                    <li>
                        <a href="#!">Usługi</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Wszystkie prawa zastrzeżone
        <a href="https://mdbootstrap.com/education/bootstrap/"> Idogo.pl</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<script type="text/javascript" src="{{asset('components/material/js/jquery.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('components/material/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('components/material/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('components/material/js/mdb.min.js')}}"></script>
<!-- SLICK -->
<script type="text/javascript" src="{{asset('components/slick-1.8.1/slick/slick.min.js')}}"></script>
<!-- DATATABLES -->
<script type="text/javascript" src="{{asset('components/material/js/addons/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('components/material/js/addons/datatables-select.min.js')}}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>


@stack('scripts')
</body>
</html>



