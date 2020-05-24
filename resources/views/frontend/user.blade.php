
@extends('layouts.menu')

@section('content')
    <div id="ModuleName" data-moduleName="frontendUser">


        <div class="container mt-5 mb-5">

            <div class="row mb-5">

                <div class="col-lg-12 col-md-12">

                    <div class="jumbotron text-center border-none p-4 bg-white">

                        <div class="row">

                            <div class="col-md-4 offset-md-1 mx-3 my-3">

                                <div class="view overlay">
{{--                                    <img {{ $user->photos->first()->path ?? $placeholderShelter}} class="img-fluid z-depth-1 circle" alt="Sample image for first version of blog listing">--}}

                                    <img src="{{Auth::user()->photos[0]['path'] ?? $placeholderUser}}" class="img-fluid circle mx-auto my-auto" alt="{{$user->FullName}}">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                            </div>

                            <div class="col-md-7 text-md-left ml-3 mt-3">

                                <h4 class="mb-2 card-title">{{$user->FullName }}</h4>

                                <hr class="mt-0">

                                <p class="card-text">{{$user->email}}</p>

                                @if(isset($user->phones[0]))
                                    <button id="showPhoneNumbers" data-user-id="{{$user->id}}" class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none m-0 mb-3">Wyświetl numery <i class=" ml-2 fas fa-lg text-white fa-phone"></i></button>
                                    <div id="before_send" style="display: none;">
                                        <p>Ładowanie <i class="fas fa-spinner fa-spin"></i></p>
                                    </div>
                                    <div id="user_phones">

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset($animalsForUser[0]))

                    <div id="animalsAdopted" class="col-lg-12 col-md-12 mb-4">
                        <h2 class="color-mid-grey">Dodane zwierzaki</h2>
                    </div>
                    <div class="col-lg-12 col-md-12 mb-4 pl-4 pr-4">
                        <div class="row">
                            @foreach($animalsForUser as $animalForUser)

                                <div class="col-lg-3 col-md-3 p-1 mb-3">
                                    <div class="card border-none ovf-hidden animal-ovf">

                                        <!-- Card image -->
                                        <div class="view overlay">
                                            @auth

                                                @if( $animalForUser->isFavourite() )
                                                    <button
                                                        class="m-0 btn notfavouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                        tabindex="0" data-animal-id="{{$animalForUser->id}}">
                                                        <i class="fas fa-lg fa-heart pink-text"></i>
                                                    </button>
                                                @else
                                                    <button
                                                        class="m-0 btn favouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                        tabindex="0" data-animal-id="{{$animalForUser->id}}">
                                                        <i class="fas fa-lg fa-heart text-white"></i>
                                                    </button>
                                                @endif

                                            @else

                                                <a href="{{ route('login') }}"
                                                   class="m-0 btn favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">
                                                    <i class="fas fa-heart mt-1 fa-lg text-white"></i>
                                                </a>

                                            @endauth
                                            <img class="card-img-top" src="{{ $animalForUser->photos->first()->path ?? $placeholder}}" alt="{{ $animalForUser->name }}" title="{{ $animalForUser->name }}">
                                            <a href="{{ route('animal',['id'=>$animalForUser->id])}}">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>

                                            <div class="card-body">
                                                <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                                <!-- Title -->
                                                <h4 class="card-title mb-2">{{ $animalForUser->name }}
                                                    @if ($animalForUser->animalDictionarySpecies->animal_dictionary->gender->id == 1)
                                                        <i class="ml-3 fas fa-lg fa-mars color-male"></i>
                                                    @else
                                                        <i class="ml-3 fas fa-lg fa-venus color-female"></i>
                                                    @endif
                                                </h4>

                                                <div class="d-flex flex-wrap mb-3">
                                                    {!! '<p class="card-text w-50 mb-1">Wiek: <span class="font-weight-bold color-mid-grey ">'. $animalForUser->age .' lat/a</span></p>' ?? ''!!}
                                                    {!! '<p class="card-text w-50 mb-1">Wielkość: <span class="font-weight-bold color-mid-grey ">'. $animalForUser->animalSize->name .'</span></p>' ?? ''!!}
                                                </div>

                                                <p class="card-text">{{ str_limit($animalForUser->description, 77) }}</p>

                                                <!-- Button -->
                                                <div class="d-flex justify-content-around">
                                                    <a href="{{ route('animal',['id'=>$animalForUser->id])}}" class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
                                                    <a href="{{ route('animal',['id'=>$animalForUser->id])}}" class="m-0 btn pink lighten-1 btn-rounded text-white p3-4 p3-4 waves-effect waves-light text-transform-none">Adoptuj wirtualnie</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection

