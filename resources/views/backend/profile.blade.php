
@extends('layouts.backend')

@section('content')
<div id="ModuleName" data-moduleName="backendProfile">
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h2 class="color-mid-grey">Dane osobowe</h2>
            </div>
        </div>
        <div class="container">
            <section class="mb-4">
                <div class="row">
                    <div class="col-md-12 mb-md-0 mb-5">
                        <form {{ $novalidate    }} class="md-form m-0" style="color: #757575;"
                              method="POST" action="{{ route('profile')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- NAME -->
                            <div class="form-row">
                                <div class="col">
                                    <div class="md-form">
                                        <input type="text" id="name" name="name"
                                               class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               value="{{ $user->name }}" required>
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
                                               value="{{ $user->surname }}" required>
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
                                       value="{{ $user->email }}" required disabled>
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

        <div class="row mt-5">
            <div class="col-lg-12 col-md-12 mb-4">
                <h2 class="color-mid-grey">Dane kontaktowe</h2>
            </div>
        </div>
        <div class="container">
            <section class="mb-4">
                <div class="row">
                    <div class="col-md-12 mb-md-0 mb-5">
                        @if(isset($user->phones[0]))
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">LP</th>
                                        <th scope="col">Telefon</th>
                                        <th scope="col">Data dodania</th>
                                        <th scope="col">Akcje</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->phones as $key => $phone)
                                        <tr>
                                            <th scope="row">{{$key +1}}</th>
                                            <td class="phone-number">{{$phone->phone}}</td>
                                            <td>{{$phone->created_at}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button
                                                        class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-phone-number"
                                                        data-phone-id="{{$phone->id}}"><i class="fas fa-edit"></i>
                                                    </button>
                                                    <button
                                                        class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-phone-number"
                                                        data-phone-id="{{$phone->id}}"><i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <button type="button" id="add-phone-number"
                                class="btn btn indigo lighten-1 btn-rounded text-white pl-5 pr-5 waves-effect waves-light text-transform-none mt-1">
                            Dodaj numer telefonu
                        </button>
                    </div>
                </div>
            </section>

        {{--MODALS--}}


        <!-- Modal Report-->
            <div class="modal fade" id="phone-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><span id="phone-title-modal"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ml-4 mr-4">
                            <div class="md-form">
                                <input type="text" id="phone-number" name="phone-number"
                                       class="form-control"
                                       value="" required>
                                <label for="phone-number">{{ __('Telefon *') }}</label>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-start">
                            <button id="save-phone-number" data-phone-id=""
                                    class="btn indigo lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                Zapisz
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Repost-->

            {{--END MODALS--}}
        </div>
    </div>
</div>
@endsection
