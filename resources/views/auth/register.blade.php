
@extends('layouts.menu')

@section('content')
    <main class="login-bg">
        <div class="container-fluid h-100 pl-0 mr-2">

            <div class="row">

                <div class="col-lg-7 col-md-12 my-auto mx-auto p-5">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
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
                            <strong>Rejestracja</strong>
                        </h5>

                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">

                            <!-- Form -->
                            <form {{ $novalidate }} class="text-center" style="color: #757575;"
                                  method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- NAME -->
                                <div class="form-row">
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="name" name="name"
                                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{ old('name') }}
                                            " required>
                                            <label for="name">{{ __('Imie *') }}</label>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="surname" name="surname"
                                                   class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" value="{{ old('surname') }}
                                            " required>
                                            <label for="surname">{{ __('Nazwisko *') }}</label>

                                            @if ($errors->has('surname'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="md-form">
                                    <input type="email" id="email" name="email"
                                           class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}
                                    " required>
                                    <label for="email">{{ __('Adres email *') }}</label>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input type="password" id="password" name="password"
                                           class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}
                                    " required>
                                    <label for="password">{{ __('Hasło *') }}</label>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                           class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" value="{{ old('password_confirmation') }}
                                    " required>
                                    <label for="password_confirmation">{{ __('Powtórz hasło *') }}</label>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <button type="submit"
                                        class="btn btn indigo lighten-1 btn-rounded text-white pl-5 pr-5 waves-effect waves-light text-transform-none m-4">
                                    {{ __('Zarejestruj') }}
                                </button>

                            </form>
                            <!-- Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
