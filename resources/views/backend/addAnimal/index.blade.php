@extends('layouts.backend')

@section('content')
    <div id="ModuleName" data-moduleName="backendAddAnimal">
        <div class="container mb-4 min-vh-100">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Dodaj zwierzaka</h2>
                </div>
            </div>
            <div class="container">
                <section class="mb-4">
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-5">
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

                                <button type="submit"
                                        class="btn btn indigo lighten-1 btn-rounded text-white pl-5 pr-5 waves-effect waves-light text-transform-none m-4">
                                    {{ __('Wyjślij formularz') }}
                                </button>



                            </form>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
