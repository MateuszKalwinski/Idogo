
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Portfolio with bootstrap">
    <meta name="author" content="Mateusz Kałwiński">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    {{--<link rel="stylesheet" href="https://bootswatch.com/3/readable/bootstrap.min.css" crossorigin="anonymous">--}}

    <link rel="icon" href="{{asset('images/logo.png')}} ">
    {{-- FONTs--}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/solid.css" integrity="sha384-Rw5qeepMFvJVEZdSo1nDQD5B6wX0m7c5Z/pLNvjkB14W6Yki1hKbSEQaX9ffUbWe" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/fontawesome.css" integrity="sha384-GVa9GOgVQgOk+TNYXu7S/InPTfSDTtBalSgkgqQ7sCik56N9ztlkoTr2f/T44oKV" crossorigin="anonymous">
    {{-- JQUERY--}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    {{-- BOOTSTRAP--}}
    <link rel="stylesheet" href="{{asset('components/bootstrap4/css/bootstrap.min.css')}}">

    {{-- FONT-AWASOME --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{--SLICK--}}
    <link rel="stylesheet" href="{{asset('components/slick-1.8.1/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('components/slick-1.8.1/slick/slick-theme.css')}}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script>
        var base_url = '{{ url('/') }}';
    </script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger nav-image-link" href="{{ route('home')    }}">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo-size">
        </a>
        <div class="position-relative">

        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('shelters')}}">Schroniska</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('animals',['slug'=>'']) }}">Zwierzęta</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Artykuły</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Adopcja</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Edukacja</a></li>
            </ul>
            @auth
                <ul class="navbar-nav ml-auto nav-flex-icons">

                    <li class="nav-item avatar dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <div>
                                    <img class="rounded-circle menu-profile-image" src="{{Auth::user()->photos[0]['path'] ?? $placeholderUser}}">
                                </div>
                                <div class="ml-2 mr-2">
                                    <p class="nav-item mb-0">{{ Auth::user()->name .' '. Auth::user()->surname }}</p>
                                    <small class="nav-item">{{ Auth::user()->email }}</small>
                                </div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                                 aria-labelledby="navbarDropdownMenuLink-55">
                                <a class="dropdown-item" href="{{ route('profile') }}">Mój profil</a>
                                <a class="dropdown-item" href="{{ route('adminHome') }}">Panel administracyjny</a>
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
                    <li class="nav-item ">

                    </li>
                </ul>
            @endauth
            @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link btn btn-menu"  href="{{ route('login') }}">Zaloguj</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-menu" href="{{ route('register') }}">Zarejestruj</a></li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
<!-- Masthead -->

@yield('content')

<div class="container-fluid">
    <footer>

    </footer>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="{{ asset('components/bootstrap4/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('components/slick-1.8.1/slick/slick.min.js')}}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>


@stack('scripts')
</body>
</html>
