
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


<!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark elegant-color-dark" style="background-color: #212121 !important;">
        <div class="container ">
            <a class="navbar-brand" href="{{route('home')}}"><strong>Idogo</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto w-100 position-relative">
                    <button data-toggle="modal" data-target="#global_search_modal" type="button" class="btn-header btn-header-left nav-btn-search">
                        <i class="fas fa-search pr-3 grey-text" aria-hidden="true"></i>
                        <span class="grey-text">Wpisz czego szukasz</span>
                    </button>
                    <button data-toggle="modal" data-target="#cities_search_modal" type="button" class="btn-header btn-header-right nav-btn-search">
                        <i class="fas fa-map-marker-alt pr-3 grey-text" aria-hidden="true"></i>
                        <span class="grey-text">Gdzie?</span>
                    </button>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <i class="far fa-2x fa-user-circle text-muted my-auto"></i>
                    <li class="nav-item"><a class="nav-link"  href="{{ route('login') }}">Zaloguj</a></li>
                    <span class="text-white my-auto">/</span>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Zarejestruj</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="login-bg">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<!--<script src="{{ asset('js/app.js') }}"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

