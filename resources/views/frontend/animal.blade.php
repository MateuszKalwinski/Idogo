@extends('layouts.menu')

@section('content')
<div id="ModuleName" data-moduleName="frontendAnimal">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">

                <h1 class="color-mid-grey my-auto">Wabię się <span class="pink-text display-4">{{$animal->name}}</span>
                </h1>

            </div>

            <div class="col-lg-8 col-md-8 ">

                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5">
                        <div class="card border-none">
                            @auth

                                @if( $animal->isFavourite() )
                                    {{--<a href="{{ route('unlike',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Unlike this object</a>--}}
                                    <button
                                        class="m-0 btn notfavouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                        tabindex="0" data-animal-id="{{$animal->id}}">
                                        <i class="fas fa-lg fa-heart pink-text"></i>
                                    </button>
                                @else
                                    {{--<a href="{{ route('like',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Like this object</a>--}}
                                    <button
                                        class="m-0 btn favouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                        tabindex="0" data-animal-id="{{$animal->id}}">
                                        <i class="fas fa-lg fa-heart text-white"></i>
                                    </button>
                                @endif

                            @else

                                <a href="{{ route('login') }}"
                                   class="m-0 btn favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">
                                    <i class="fas fa-heart mt-1 fa-lg text-white"></i>
                                </a>

                            @endauth

                            <div class="slider-for overflow-hidden mb-4">
                                @if(empty($animal->photos))
                                    <div class="slider-container">
                                        <img class="w-100" src="{{ $placeholder}}" alt="">
                                    </div>
                                    <div class="slider-container">
                                        <img class="w-100" src="{{ $placeholder}}" alt="">
                                    </div>
                                    <div class="slider-container">
                                        <img class="w-100" src="{{ $placeholder}}" alt="">
                                    </div>
                                @else
                                    @foreach($animal->photos as $photo)
                                        <div class="slick-max-image-height">
                                            <img class="mx-auto slick-max-image-height" src="{{ $photo->path ?? $placeholder}}" alt="">
                                        </div>
                                    @endforeach
                                @endif

                            </div>

                            <div class="slider-nav overflow-hidden">
                                @if(empty($animal->photos))
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholder}}" alt="">
                                    </div>
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholder}}" alt="">
                                    </div>
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholder}}" alt="">
                                    </div>
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholder}}" alt="">
                                    </div>
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholder}}" alt="">
                                    </div>
                                @else
                                    @foreach($animal->photos as $photo)
                                        <img src="{{ $photo->path ?? $placeholder}}" alt="">
                                    @endforeach
                                @endif
                            </div>

                            <div class="d-flex justify-content-between pl-3 pt-3 pr-3">
                                <div class="d-flex">
                                    <p class="text-black-50 mr-2">{{$animal->created_at}}</p>
                                    <p class="text-black-50">ID: {{$animal->id}}</p>
                                </div>
                                <div>
                                    <a href="#" class="text-black-50" id="report" data-toggle="modal"
                                       data-target="#reportViolationModal">Zgłoś naruszenie <i
                                            class="ml-2 far fa-flag"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="card border-none">
                            <div class="card-body pb-0">
                                <h3 class="card-title">Informacje o zwierzaku:</h3>
                                <hr>
                                <ul class="d-flex flex-row flex-wrap mb-0 p-0" style=" list-style-type: none;">
                                    {!! '<li class="pr-4 p-1 card-text lead">Gatunek: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalDictionarySpecies->animal_dictionary->name .'</span></li>' ?? ''!!}
                                    {!! '<li class="pr-4 p-1 card-text lead">Rasa: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalBreed->name .'</span></li>' ?? ''!!}
                                    {!! '<li class="pr-4 p-1 card-text lead">Wiek: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->age .' lat</span></li>' ?? ''!!}
                                    {!! '<li class="pr-4 p-1 card-text lead">Płeć: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalDictionarySpecies->animal_dictionary->gender->name .'</span></li>' ?? ''!!}
                                    {!! '<li class="pr-4 p-1 card-text lead">Kolor: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalColor->name .'</span></li>' ?? ''!!}
                                    {!! '<li class="pr-4 p-1 card-text lead">Wielkość: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalSize->name .'</span></li>' ?? ''!!}
                                    {!! '<li class="pr-4 p-1 card-text lead">Długość futra: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalFur->name .'</span></li>' ?? ''!!}
                                    {!! '<li class="pr-4 p-1 card-text lead">Status: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalStatus->name .'</span></li>' ?? ''!!}

                                </ul>
                            </div>
                        </div>
                        <div class="card border-none">
                            <div class="card-body">
                                <h3 class="card-title">Opis:</h3>
                                <hr>
                                <p class="card-text">{{$animal->description}}</p>
                            </div>
                        </div>
                        @if($animal->animalable->adoption_policy)
                            <div class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Polityka adopcji:</h3>
                                    <hr>
                                    <p class="card-text">{{$animal->animalable->adoption_policy}}</p>
                                </div>
                            </div>
                        @endif

                        <div class="card border-none">
                            <div class="card-body">
                                <h3 class="card-title">Cechy zwierzaka:</h3>
                                <hr>
                                <div class="row">
                                @foreach($animal->animalCharacteristic->chunk(4) as $chunkedAnimalCharacteristic)

                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush card-text">
                                        @foreach($chunkedAnimalCharacteristic as $animalCharacteristic)

                                            @if($animalCharacteristic->character_status == 1)
                                                <li class="list-group-item mb-0 d-flex justify-content-between align-content-center">
                                                    <i class="fas fa-lg fa-paw mt-1 indigo-text"></i>
                                                    <span>{{$animalCharacteristic->characteristicDictionary->name}}</span>
                                                </li>
                                            @else
                                                <li class="list-group-item mb-0 d-flex justify-content-between align-content-center">
                                                    <i class="fas fa-lg fa-paw mt-1 grey-text"></i>
                                                    <span>{{$animalCharacteristic->characteristicDictionary->name}}</span>
                                                </li>
                                        @endif
                                        @endforeach

                                        </ul>
                                    </div>

                                @endforeach
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

            <div class="col-lg-4 col-md-4">

                <!-- Card Regular -->
                <div class="card card-cascade border-none mb-5">


                    <!-- Card content -->
                    <div class="card-body card-body-cascade">

                        @if($animal->animalable_type == 'App\Shelter')
                            <h4 class="card-title text-center mb-4">Wesprzyj zwierzaka!</h4>
                            <button
                                class="btn pink lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">
                                Wirtualna adopcja <i class="ml-2 fas fa-lg text-white fa-heart fa-beat"></i></button>
                        @elseif($animal->animalable_type == 'App\User')
                            @php setlocale(LC_MONETARY, 'pl_PL'); @endphp
                            <h4 class="card-title text-center mb-4">{{ money_format('%i', $animal->price) .' zł'}} </h4>
                        @endif

                        {{--                        <button class="btn pink lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">Wirtualna adopcja <i class="ml-2 fas fa-lg text-white fa-heart fa-beat"></i></button>--}}
                        <button id="scrollToContact"
                                class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">
                            Zapytaj o pupila <i class="ml-2 fas fa-lg text-white fa-envelope"></i></button>
                        <hr>
                        <h4 class="card-title text-center mb-4">Udostępnij</h4>

                        <p class="card-text">Udostępniając zwiększasz moje szanse na znalezienie domu. Dziękuję!</p>

                        <div class="d-flex justify-content-center flex-wrap">
                            <a class="btn-floating btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn-floating btn-tw" type="button" role="button"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn-floating indigo accent-1" type="button" role="button"><i
                                    class="fas fa-link"></i></a>
                            <a class="btn-floating indigo lighten-1" type="button" role="button"><i
                                    class="fas fa-envelope"></i></a>
                        </div>

                    </div>

                </div>
                <!-- Card Regular -->


                <!-- Card Regular -->
                <div class="card card-cascade border-none">

                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="{{$placeholderShelter}}"
{{--                        <img class="card-img-top" src="{{ $animal->photos->first()->path ?? $placeholderShelter}}"--}}
                             alt="Card image cap">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card content -->
                    <div class="card-body card-body-cascade">

                        <div class="d-flex justify-content-center">
                            @if($animal->animalable_type == 'App\Shelter')
                                <a href="{{ route('shelter',['id'=>$animal->animalable_id])}}" class="indigo-text"
                                   style="font-size: 2.3rem;">{{$animal->animalable->name }} </a>
                            @elseif($animal->animalable_type == 'App\User')
                                <a href="{{ route('user',['id'=>$animal->animalable_id])}}" class="indigo-text"
                                   style="font-size: 2.3rem;">{{$animal->animalable->name }} {{$animal->animalable->surname}} </a>
                            @endif
                        </div>

                        @foreach($animal->addressable as $address)
                            <p class="card-text">{{$address ->street . ' '. $address ->number }} <span
                                    class="font-weight-bold"> {{$address->city->name}}</span>
                                ({{$address->city->province->name}})</p>
                        @endforeach

                        @if(isset($animal->addressable[0]))
                            <a href="#" id="scrollToMap" class="indigo-text">Pokaż mapę <i
                                    class="ml-2 fa-lg fas fa-map-marker-alt"></i></a>
                        @endif

                        <hr>

                        <h4 class="card-title text-center mb-4">Kontakt</h4>
                        <p class="card-text">{{$animal->animalable->user->email}}</p>

                        @if(isset($animal->animalable->user->phones[0]))
                            <button id="showPhoneNumbers" data-user-id="{{$animal->animalable->user->id}}"
                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">
                                Wyświetl numery <i class=" ml-2 fas fa-lg text-white fa-phone"></i></button>
                            <div id="before_send" style="display: none;">
                                <p>Ładowanie <i class="fas fa-spinner fa-spin"></i></p>
                            </div>
                            <div id="user_phones">

                            </div>
                        @endif
                    </div>

                </div>
                <!-- Card Regular -->


            </div>


        </div>
    </div>
    <div id="contact" class="container-fluid indigo lighten-1 p-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 pt-4 pb-4">
                    <h2 class="text-white">Zapytaj o pupila</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <section class="mb-4">
            <div class="row">

                <div class="col-md-12 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="" method="POST">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Imie i nazwisko</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Email</label>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2"
                                              class="form-control md-textarea"
                                              placeholder="Chciałbym/chciałabym zaadoptować tego pupila ponieważ..."></textarea>
                                    <label for="message">Twoja wiadomość</label>
                                </div>

                            </div>
                        </div>

                    </form>

                    <div class="text-center text-md-left">
                        <button
                            class="btn indigo lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                            Wyślij <i class="ml-2 fas fa-lg text-white fa-paper-plane"></i></button>
                    </div>
                    <div class="status"></div>
                </div>

            </div>

        </section>
        <div class="container-fluid mt-3 mb-5 p-0" id="map">

            <!-- Section: Block Content -->
            <section class="mb-4">

                <style>
                    .map-container {
                        overflow: hidden;
                        position: relative;
                        height: 0;
                    }

                    .map-container iframe {
                        left: 0;
                        top: 0;
                        height: 100%;
                        width: 100%;
                        position: absolute;
                    }
                </style>


                @if(isset($animal->addressable[0]))
                    @if(isset($animal->addressable[0]->lon) && isset($animal->addressable[0]->lat))
                        @php
                            $lon = $animal->addressable[0]->lon;
                            $lat = $animal->addressable[0]->lat;
                        @endphp
                        <div id="full-width-map" class="z-depth-1-half map-container" style="height: 500px">
                            <iframe
                                src="https://maps.google.com/maps?q={{$lon}},{{$lat}}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0"
                                style="border:0" allowfullscreen></iframe>
                        </div>
                @endif
            @endif

            <!-- Google Maps -->

                <!-- Google Maps -->

            </section>
            <!-- Section: Block Content -->

        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Zobacz więcej</h2>
                </div>
                <div class="col-lg-12 col-md-12 pl-4 pr-4">
                    <div class="row">
                        @foreach($otherAnimals as $otherAnimal)

                            <div class="col-lg-3 col-md-3 p-1">
                                <div class="card border-none ovf-hidden animal-ovf">

                                    <!-- Card image -->
                                    <div class="view overlay">
                                        @auth

                                            @if( $otherAnimal->isFavourite() )
                                                {{--<a href="{{ route('unlike',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Unlike this object</a>--}}
                                                <button
                                                    class="m-0 btn notfavouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                    tabindex="0" data-animal-id="{{$otherAnimal->id}}">
                                                    <i class="fas fa-lg fa-heart pink-text"></i>
                                                </button>
                                            @else
                                                {{--<a href="{{ route('like',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Like this object</a>--}}
                                                <button
                                                    class="m-0 btn favouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                    tabindex="0" data-animal-id="{{$otherAnimal->id}}">
                                                    <i class="fas fa-lg fa-heart text-white"></i>
                                                </button>
                                            @endif

                                        @else

                                            <a href="{{ route('login') }}"
                                               class="m-0 btn favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">
                                                <i class="fas fa-heart mt-1 fa-lg text-white"></i>
                                            </a>

                                        @endauth
                                        <div class="w-100 pt-2 pl-2 pr-5 pb-2 d-flex bg-black-50 shelter-info">
                                            <div class="card-shelter-photo"
                                                 style="background-image: url({{ $animal->photos->first()->path ?? $placeholderShelter}});"></div>
                                            <div class="ml-3 d-flex align-items-center">

                                                @if($otherAnimal->animalable_type == 'App\Shelter')
                                                    <a href="{{ route('shelter',['id'=>$otherAnimal->animalable_id])}}"
                                                       class="text-white">{{$otherAnimal->animalable->name }} </a>
                                                @elseif($otherAnimal->animalable_type == 'App\User')
                                                    <a href="{{ route('user',['id'=>$otherAnimal->animalable_id])}}"
                                                       class="text-white">{{$otherAnimal->animalable->name }} {{$otherAnimal->animalable->surname}} </a>
                                                @endif

                                            </div>
                                        </div>
                                        <img class="card-img-top"
                                             src="{{ $otherAnimal->photos->first()->path ?? $placeholder}}"
                                             alt="{{ $otherAnimal->name }}" title="{{ $otherAnimal->name }}">
                                        <a href="{{ route('animal',['id'=>$otherAnimal->id])}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>

                                        <div class="card-body">
                                            <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                            <!-- Title -->
                                            <h4 class="card-title mb-2">{{ $otherAnimal->name }}
                                                @if ($otherAnimal->animalDictionarySpecies->animal_dictionary->gender->id == 1)
                                                    <i class="ml-3 fas fa-lg fa-mars color-male"></i>
                                                @else
                                                    <i class="ml-3 fas fa-lg fa-venus color-female"></i>
                                                @endif
                                            </h4>

                                            <div class="d-flex flex-wrap mb-3">
                                                {{--                                        {!! '<p class="card-text w-50 mb-1" >Ganutek: <span class="font-weight-bold color-mid-grey ">'. $animal->animalDictionarySpecies->animal_dictionary->name .'</span></p>' ?? ''!!}--}}
                                                {!! '<p class="card-text w-50 mb-1">Wiek: <span class="font-weight-bold color-mid-grey ">'. $otherAnimal->age .' lat/a</span></p>' ?? ''!!}
                                                {!! '<p class="card-text w-50 mb-1">Wielkość: <span class="font-weight-bold color-mid-grey ">'. $otherAnimal->animalSize->name .'</span></p>' ?? ''!!}
                                            </div>

                                            <p class="card-text">{{ str_limit($otherAnimal->description, 77) }}</p>

                                            <!-- Button -->
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('animal',['id'=>$otherAnimal->id])}}"
                                                   class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
                                                <a href="{{ route('animal',['id'=>$otherAnimal->id])}}"
                                                   class="m-0 btn pink lighten-1 btn-rounded text-white p3-4 p3-4 waves-effect waves-light text-transform-none">Adoptuj
                                                    wirtualnie</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


{{--MODALS--}}


<!-- Modal Report-->
    <div class="modal fade" id="reportViolationModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Zgłoś naruszenie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reportViolationSpam"
                               name="reportViolation" value="Spam">
                        <label class="form-check-label" for="reportViolationSpam">Spam</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reportViolationWrongCategory"
                               name="reportViolation" value="Niewłaściwa kategoria">
                        <label class="form-check-label" for="reportViolationWrongCategory">Niewłaściwa
                            kategoria</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reportViolationOutdated"
                               name="reportViolation" value="Ogłoszenie nieaktualne">
                        <label class="form-check-label" for="reportViolationOutdated">Ogłoszenie
                            nieaktualne</label>
                    </div>
                    <div class="md-form mt-1 ml-4 mr-4">
                            <textarea id="reportViolationText" name="reportViolationText"
                                      class="md-textarea form-control" rows="2"
                                      placeholder="To ogłoszenie narusza zasady ponieważ"></textarea>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <button id="sendReport" data-animal-id="{{$animal->id}}"
                        class="btn indigo lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                        Wyślij <i class="ml-2 fas fa-lg text-white fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Repost-->

    {{--END MODALS--}}
</div>

@endsection


