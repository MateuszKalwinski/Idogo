@extends('layouts.menu')

@section('content')
    <main class="login-bg">
        <div class="container-fluid h-100 pl-0 mr-2">

            <div class="row">

                <div class="col-lg-7 col-md-12 my-auto mx-auto p-5">
                    <div class="intro-info-content">
                        <h1 class="display-4 white-text mb-4 quotes font-weight-light">Adoptuj pupila</h1>
                        <h1 class="display-4 white-text mb-4 quotes font-weight-light">Wspomóż schroniska</h1>
                        <h1 class="display-4 white-text mb-4 quotes font-weight-light">Znajdź najlepszych
                            weterynarzy</h1>
                        <h5 class="white-text mb-4 mt-1">Idogo. Z myślą o naszych podopiecznych </h5>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 p-5">

                    <!-- Material form login -->
                    <div class="card border-none z-depth-2 mx-auto">

                        <h5 class="card-header elegant-color-dark white-text text-center py-4 mb-5">
                            <strong>Logowanie</strong>
                        </h5>

                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Email -->
                                <div class="md-form">
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                                    <label for="email">{{ __('E-Mail *') }}</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="md-form">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    <label for="password">{{ __('Hasło *') }}</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="d-flex justify-content-around">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Zapamiętaj mnie') }}
                                        </label>
                                    </div>
                                </div>

                                    <div>
                                        @if (Route::has('password.request'))
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ __('Nie pamiętam hasła') }}
                                        </a>
                                        @endif
                                    </div>


                                </div>


                                <button type="submit" class="btn btn indigo lighten-1 btn-rounded text-white pl-5 pr-5 waves-effect waves-light text-transform-none m-4">
                                    {{ __('Zaloguj') }}
                                </button>



                                <!-- Register -->
                                <p>Nie masz konta?
                                    <a href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
                                </p>

                                <!-- Social login -->
                                <p>lub zaloguj przez</p>
                                <a href="{{url('/redirect')}}" type="button" class="btn-floating btn-fb btn-sm">
                                    <i class="fab fa-lg fa-facebook-f my-auto"></i>
                                </a>
                                <a type="button" class="btn-floating btn-gplus btn-sm">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>

                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
