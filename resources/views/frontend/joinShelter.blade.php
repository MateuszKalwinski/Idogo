
@extends('layouts.menu')

@section('content')
    <main class="login-bg">
        <div class="container-fluid h-100 pl-0 mr-2">

            <div class="row">

                <div class="col-lg-7 col-md-12 my-auto mx-auto p-5">
                    <div class="intro-info-content mb-5">
                        <h1 class="display-4 white-text mb-4 quotes font-weight-light">Adoptuj pupila</h1>
                        <h1 class="display-4 white-text mb-4 quotes font-weight-light">Wspomóż schroniska</h1>
                        <h1 class="display-4 white-text mb-4 quotes font-weight-light">Znajdź najlepszych
                            weterynarzy</h1>
                        <h5 class="white-text mb-4 mt-1">Idogo. Z myślą o naszych podopiecznych </h5>
                    </div>

                    <div class="w-50">
                        <p class="text-white">
                            Aby zapewnić bezpieczeństwo i wiarygodność dodawanych schronisk jak i zwierzaków, Zespół Idogo przeprowadzi weryfikację schroniska w oparciu o informacje przekazane przez formularz.
                        </p>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 p-5">

                    <!-- Material form login -->
                    <div class="card border-none z-depth-2 mx-auto">

                        <h5 class="card-header elegant-color-dark white-text text-center py-4 mb-5">
                            <strong>Dodaj schronisko</strong>
                        </h5>

                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">

                            <!-- Form -->
                            <form {{ $novalidate    }} class="text-center" style="color: #757575;"
                                  method="POST" action="{{ route('joinShelterForm') }}">
                            @csrf
                            <!-- NAME -->
                                <div class="form-row">
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="name" name="name"
                                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
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
                                                   class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" value="{{ old('surname') }}" required>
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
                                           class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                                    <label for="email">{{ __('Adres email *') }}</label>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input type="text" id="phone" name="phone"
                                           class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" required>
                                    <label for="email">{{ __('Telefon *') }}</label>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input type="text" id="shelterName" name="shelterName"
                                           class="form-control {{ $errors->has('shelterName') ? ' is-invalid' : '' }}" value="{{ old('shelterName') }}" required>
                                    <label for="password">{{ __('Nazwa schroniska *') }}</label>

                                    @if ($errors->has('shelterName'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shelterName') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="md-form">
                                    <input type="text" id="shelterAddress" name="shelterAddress"
                                           class="form-control {{ $errors->has('shelterAddress') ? ' is-invalid' : '' }}" value="{{ old('shelterAddress') }}" required>
                                    <label for="password">{{ __('Ulica') }}</label>

                                    @if ($errors->has('shelterAddress'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shelterAddress') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="ShelterZipCode" name="ShelterZipCode"
                                                   class="form-control {{ $errors->has('ShelterZipCode') ? ' is-invalid' : '' }}" value="{{ old('ShelterZipCode') }}" required>
                                            <label for="name">{{ __('Kod pocztowy *') }}</label>

                                            @if ($errors->has('ShelterZipCode'))
                                                <span class="invalid-feedback"><strong>{{ $errors->first('ShelterZipCode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="shelterCity" name="shelterCity"
                                                   class="form-control {{ $errors->has('shelterCity') ? ' is-invalid' : '' }}" value="{{ old('shelterCity') }}" required>
                                            <label for="surname">{{ __('Miastio *') }}</label>

                                            @if ($errors->has('shelterCity'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('shelterCity') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="ShelterTaxNumber" name="ShelterTaxNumber"
                                                   class="form-control {{ $errors->has('ShelterTaxNumber') ? ' is-invalid' : '' }}" value="{{ old('ShelterTaxNumber') }}" required>
                                            <label for="name">{{ __('NIP *') }}</label>

                                            @if ($errors->has('ShelterTaxNumber'))
                                                <span class="invalid-feedback"><strong>{{ $errors->first('ShelterTaxNumber') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="shelterRegonNumber" name="shelterRegonNumber"
                                                   class="form-control {{ $errors->has('shelterRegonNumber') ? ' is-invalid' : '' }}" value="{{ old('shelterRegonNumber') }}" required>
                                            <label for="surname">{{ __('REGON *') }}</label>

                                            @if ($errors->has('shelterRegonNumber'))
                                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('shelterRegonNumber') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="form-check text-left p-0">
                                        <input type="checkbox" class="form-check-input  {{ $errors->has('accept_regulation') ? ' is-invalid' : '' }}" id="accept_regulation" name="accept_regulation" value="1">
                                        <label class="form-check-label" for="accept_regulation">{{ __('Akceptuje regulamin *') }}</label>
                                        @if ($errors->has('accept_regulation'))
                                            <span class="invalid-feedback"><strong>{{ $errors->first('accept_regulation') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <a class="ml-3" href="{{ route('regulation') }}">Regulamin Idogo</a>
                                </div>

                                <button type="submit"
                                        class="btn btn indigo lighten-1 btn-rounded text-white pl-5 pr-5 waves-effect waves-light text-transform-none m-4">
                                    {{ __('Wyjślij formularz') }}
                                </button>



                            </form>

                            @if(Session::has('message'))
                                <p class="card-text">{{ Session::get('message') }}</p>
                            @endif
                            <!-- Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
