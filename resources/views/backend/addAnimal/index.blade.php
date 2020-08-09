
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
                            <form {{ $novalidate    }} class="md-form m-0" style="color: #757575;"
                                  method="POST" action="{{ route('addAnimal')}}" enctype="multipart/form-data">
                            @csrf
                            <!-- NAME -->
                                <div class="form-row">
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="name" name="name"
                                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   value="" required>
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
                                                   class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                                   value="" required>
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
                                           class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           value="" required disabled>
                                    <label for="email" class="disabled">{{ __('Adres email *') }}</label>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="file-field">
                                    <div class="btn btn-pink btn-rounded btn-sm float-left">
                                        <span class="text-white"><i class="fas fa-upload mr-2" aria-hidden="true"></i>Wybierz zdjęcie</span>
                                        <input type="file" id="userPicture" name="userPicture">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path {{ $errors->has('userPicture') ? ' is-invalid' : '' }}"
                                               type="text"
                                               placeholder="Wybierz swoje zdjęcie profilowe klikając przycisk. Maksymalny rozmiar 2MB">
                                    </div>
                                </div>
                                @if ($errors->has('userPicture'))

                                    <span class="invalid-feedback d-block">
                                <strong>{{ $errors->first('userPicture') }}</strong>
                        </span>
                                @endif
                                <br>
                                <button type="submit"
                                        class="btn btn indigo lighten-1 btn-rounded text-white pl-5 pr-5 waves-effect waves-light text-transform-none mt-1">
                                    {{ __('Zapisz') }}
                                </button>
                            </form>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
