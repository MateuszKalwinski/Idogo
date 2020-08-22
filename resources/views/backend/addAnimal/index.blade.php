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
                                  method="POST" action="{{ route('addAnimalForm') }}" enctype="multipart/form-data">
                                @csrf
                                <h4 class="card-title text-left">Dane zwierzaka:</h4>
                                <div class="form-row">
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <input type="text" id="animalName" name="animalName"
                                                   class="form-control {{ $errors->has('animalName') ? ' is-invalid' : '' }}"
                                                   value="{{ old('animalName') }}" required>
                                            <label for="name">{{ __('Imię zwierzaka *') }}</label>

                                            @if ($errors->has('animalName'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('animalName') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <select id="speciesId" name="speciesId"
                                                    class="mdb-select md-form {{ $errors->has('speciesId') ? ' is-invalid' : '' }}"
                                                    searchable="Wybierz gatunek *" data-visible-options="10"
                                                    data-max-selected-options="1">
                                                <option value="" disabled selected>Wybierz gatunek *</option>
                                            </select>
                                            <button type="button"
                                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                                Wybierz
                                            </button>
                                            @if ($errors->has('speciesId'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('speciesId') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-4 pl-2">
                                        <div class="md-form">
                                            <select id="breedId" name="breedId"
                                                    class="mdb-select md-form {{ $errors->has('breedId') ? ' is-invalid' : '' }}"
                                                    searchable="Wybierz rasę" data-visible-options="10"
                                                    data-max-selected-options="1">
                                                <option value="" disabled selected>Wybierz rasę</option>
                                            </select>
                                            <button type="button"
                                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                                Wybierz
                                            </button>
                                            @if ($errors->has('breedId'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('breedId') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2 pr-2">
                                        <div class="md-form">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="inBreedType" name="inBreedType">
                                                <label class="form-check-label" for="inBreedType">W typie
                                                    rasy</label>
                                                 <i data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Zaznacz jeśli Twój zwierzak jest podony do wybranej rasy"
                                                        class="far fa-question-circle"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <select id="genderId" name="genderId"
                                                    class="mdb-select md-form {{ $errors->has('genderId') ? ' is-invalid' : '' }}"
                                                    searchable="Wybierz płeć *" data-visible-options="10"
                                                    data-max-selected-options="1">
                                                <option value="" disabled selected>Wybierz płeć *</option>
                                            </select>
                                            <button type="button"
                                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                                Wybierz
                                            </button>
                                            @if ($errors->has('genderId'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('genderId') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <input type="number" id="animalAge" name="animalAge" min="1" max="200"
                                                   class="form-control {{ $errors->has('animalAge') ? ' is-invalid' : '' }}"
                                                   value="{{ old('animalAge') }}">
                                            <label for="name">{{ __('Wiek zwierzaka') }}</label>

                                            @if ($errors->has('animalAge'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('animalAge') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <select id="sizeId" name="sizeId"
                                                    class="mdb-select md-form {{ $errors->has('sizeId') ? ' is-invalid' : '' }}"
                                                    searchable="Wybierz wielkość *" data-visible-options="10"
                                                    data-max-selected-options="1">
                                                <option value="" disabled selected>Wybierz wielkość *</option>
                                            </select>
                                            <button type="button"
                                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                                Wybierz
                                            </button>
                                            @if ($errors->has('sizeId'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('sizeId') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <select id="animalFur" name="animalFur"
                                                    class="mdb-select md-form {{ $errors->has('animalFur') ? ' is-invalid' : '' }}"
                                                    searchable="Wybierz długość futra" data-visible-options="10"
                                                    data-max-selected-options="1">
                                                <option value="" disabled selected>Wybierz długość futra</option>
                                            </select>
                                            <button type="button"
                                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                                Wybierz
                                            </button>
                                            @if ($errors->has('animalFur'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('animalFur') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <select id="animalColor" name="animalColor"
                                                    class="mdb-select md-form {{ $errors->has('animalColor') ? ' is-invalid' : '' }}"
                                                    searchable="Wybierz kolor futra" data-visible-options="10"
                                                    data-max-selected-options="1">
                                                <option value="" disabled selected>Wybierz kolor futra</option>
                                            </select>
                                            <button type="button"
                                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                                Wybierz
                                            </button>
                                            @if ($errors->has('animalColor'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('animalColor') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12 pl-2 pr-2">
                                        <div class="md-form">
                                            <select id="animalCharacteristics" name="animalCharacteristics[]"
                                                    class="mdb-select md-form {{ $errors->has('animalCharacteristics') ? ' is-invalid' : '' }}"
                                                    multiple
                                                    searchable="Wybierz cechy zwierzaka" data-visible-options="10"
                                                    data-max-selected-options="-1">
                                                <option value="" disabled selected>Wybierz cechy zwierzaka</option>

                                            </select>
                                            <button type="button"
                                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                                Wybierz
                                            </button>
                                            @if ($errors->has('animalCharacteristics'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('animalCharacteristics') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12 pl-2 pr-2">
                                        <div class="md-form">
                                            <textarea id="animalDescription" name="animalDescription"
                                                      class="md-textarea form-control {{ $errors->has('animalDescription') ? ' is-invalid' : '' }}" rows="2"
                                                      placeholder="Opis zwierzaka *"></textarea>
                                            @if ($errors->has('animalDescription'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('animalDescription') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12 pl-2 pr-2">
                                        <div class="md-form">
                                            <div class="input-images-1" style="padding-top: .5rem;"></div>
                                            @if ($errors->has('animalDescription'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('animalDescription') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title text-left">Dane kontaktowe:</h4>

                                <div class="form-row">
                                    <div class="col-5 pl-2 pr-2">
                                        <div class="md-form">
                                            <input type="search" id="cityName" name="cityName" value="{{app('request')->input('cityName')}}" class="form-control mdb-autocomplete {{ $errors->has('cityName') ? ' is-invalid' : '' }}">
                                            <button class="mdb-autocomplete-clear">
                                                <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
                                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                </svg>
                                            </button>
                                            <label for="cityName" class="text-left active">Miasto *</label>
                                            <input type="hidden" id="cityId" name="cityId" value="{{app('request')->input('cityId')}}">

                                            @if ($errors->has('cityName'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('cityName') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-5 pl-2 pr-2">
                                        <div class="md-form">
                                            <div class="md-form">
                                                <input type="text" id="streetName" name="streetName"
                                                       class="form-control {{ $errors->has('streetName') ? ' is-invalid' : '' }}"
                                                       value="{{ old('streetName') }}">
                                                <label for="name">{{ __('Ulica') }}</label>

                                                @if ($errors->has('streetName'))
                                                    <span
                                                        class="invalid-feedback"><strong>{{ $errors->first('streetName') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 pl-2 pr-2">
                                        <div class="md-form">
                                            <div class="md-form">
                                                <input type="text" id="streetNumber" name="streetNumber"
                                                       class="form-control {{ $errors->has('streetNumber') ? ' is-invalid' : '' }}"
                                                       value="{{ old('streetNumber') }}">
                                                <label for="name">{{ __('Numer') }}</label>

                                                @if ($errors->has('streetNumber'))
                                                    <span
                                                        class="invalid-feedback"><strong>{{ $errors->first('streetNumber') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <select id="phones" name="phones[]"
                                                    class="mdb-select md-form {{ $errors->has('phones') ? ' is-invalid' : '' }}"
                                                    multiple
                                                    searchable="Wybierz numer telefonu *" data-visible-options="10"
                                                    data-max-selected-options="3">
                                                <option value="" disabled selected>Wybierz numer telefonu *</option>

                                            </select>
                                            <button type="button"
                                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                                Wybierz
                                            </button>
                                            @if ($errors->has('phones'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('phones') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 pl-2 pr-2">
                                        <div class="md-form">
                                            <input type="email" id="email" name="email" disabled="disabled"
                                                   class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   value="{{ old('email') ? old('email') : Auth::user()->email }}" required>
                                            <label for="name">{{ __('E-mail *') }}</label>

                                            @if ($errors->has('email'))
                                                <span
                                                    class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button type="submit"
                                        class="btn btn indigo lighten-1 btn-rounded text-white pl-5 pr-5 waves-effect waves-light text-transform-none m-4">
                                    {{ __('Dodaj zwierzaka') }}
                                </button>


                            </form>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>
    @push('scripts')

    @endpush
@endsection
