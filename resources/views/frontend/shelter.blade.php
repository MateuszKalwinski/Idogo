@extends('layouts.menu')

@section('content')
<div id="ModuleName" data-moduleName="frontendShelter">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h1 class="color-mid-grey my-auto"><span class="pink-text display-4">{{$shelter->name}}</span></h1>

            </div>

            <div class="col-lg-8 col-md-8 ">

                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5">
                        <div class="card border-none">

                            @auth

                                @if( $shelter->isFavourite() )
                                    Zwierzaki do adopcji                         {{--<a href="{{ route('unlike',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Unlike this object</a>--}}
                                    <button
                                        class="m-0 btn notfavouriteShelter favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                        tabindex="0" data-shelter-id="{{$shelter->id}}">
                                        <i class="fas fa-lg fa-heart pink-text"></i>
                                    </button>
                                @else
                                    {{--<a href="{{ route('like',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Like this object</a>--}}
                                    <button
                                        class="m-0 btn favouriteShelter favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                        tabindex="0" data-shelter-id="{{$shelter->id}}">
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
                                @if(empty($sheler->photo))
                                    <div class="slider-container">
                                        <img  class="w-100" src="{{ $placeholderShelter}}" alt="">
                                    </div>
                                    <div class="slider-container">
                                        <img  class="w-100" src="{{ $placeholderShelter}}" alt="">
                                    </div>
                                    <div class="slider-container">
                                        <img  class="w-100" src="{{ $placeholderShelter}}" alt="">
                                    </div>
                                @else
                                    @foreach($sheler->photos as $photo)
                                        <img src="{{ $sheler->path ?? $placeholderShelter}}" alt="">
                                    @endforeach
                                @endif

                            </div>

                            <div class="slider-nav overflow-hidden">
                                @if(empty($sheler->photo))
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholderShelter}}" alt="">
                                    </div>
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholderShelter}}" alt="">
                                    </div>
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholderShelter}}" alt="">
                                    </div>
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholderShelter}}" alt="">
                                    </div>
                                    <div class="slider-nav-container ml-3 mr-3 cursor-pointer">
                                        <img class="w-100" src="{{ $placeholderShelter}}" alt="">
                                    </div>
                                @else
                                    @foreach($sheler->photos as $photo)

                                        <img src="{{ $sheler->path ?? $placeholderShelter}}" alt="">
                                    @endforeach
                                @endif
                            </div>

                            <div class="d-flex justify-content-between pl-3 pt-3 pr-3">
                                <div class="d-flex">
                                    <p class="text-black-50 mr-2">{{$shelter->created_at}}</p>
                                    <p class="text-black-50">ID: {{$shelter->id}}</p>
                                </div>
                                <div>
                                    <a href="#" class="text-black-50" id="modalActivate" data-toggle="modal" data-target="#report_violation_modal">Zgłoś naruszenie <i class="ml-2 far fa-flag"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">

                        <div class="card border-none">
                            <div class="card-body pb-0">
                                <h3 class="card-title">Nasi podopieczni:</h3>
                                <hr>
                                <p class="card-text">Aktualnie mamy <span class="font-weight-bold"> {{count($animalsForAdoption)}}</span> zwierząt do adopcji <a href="#" id="scrollToAnimalsForAdoption" class="indigo-text ml-1">Zobacz</a></p>
                                <p class="card-text">Już <span class="font-weight-bold"> {{count($animalsAdopted)}}</span> podopiecznych znalazło dom. <a href="#" id="scrollToAnimalsAdopted" class="indigo-text ml-1">Zobacz</a></p>
                            </div>
                        </div>

                        <div class="card border-none">
                            <div class="card-body">
                                <h3 class="card-title">Nasza misja:</h3>
                                <hr>
                                <p class="card-text">{{$shelter->description}}</p>
                            </div>
                        </div>
                        @if($shelter->adoption_policy)
                            <div class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Polityka adopcji:</h3>
                                    <hr>
                                    <p class="card-text">{{$shelter->adoption_policy}}</p>
                                </div>
                            </div>
                        @endif
                    </div>


                </div>
            </div>

            <div class="col-lg-4 col-md-4">

                <!-- Card Regular -->
                <div class="card card-cascade border-none mb-5">



                    <!-- Card content -->
                    <div class="card-body card-body-cascade">
                        <h4 class="card-title text-center mb-4">Wspomóż schronisko!</h4>
                        <button class="btn pink lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">Wesprzyj <i class="ml-2 fas fa-lg text-white fa-heart fa-beat"></i></button>
                        <hr>

{{--                        <p class="card-text">Aktualnie mamy <span class="font-weight-bold"> {{count($animalsForAdoption)}}</span> zwierząt do adopcji</p>--}}
{{--                        <p class="card-text">Już <span class="font-weight-bold"> {{count($animalsAdopted)}}</span> podopiecznych znalazło dom</p>--}}
{{--                        <hr>--}}

                        <h4 class="card-title text-center mb-4">Udostępnij</h4>
                        <p class="card-text">Udostępniając pomagasz. Dziękujemy!</p>

                        <div class="d-flex justify-content-center">
                            <a class="btn-floating btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn-floating btn-tw" type="button" role="button"><i class="fab fa-twitter"></i></a>
                            <a class="btn-floating indigo accent-1" type="button" role="button"><i class="fas fa-link"></i></a>
                            <a class="btn-floating indigo lighten-1" type="button" role="button"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>

                </div>
                <!-- Card Regular -->


                <!-- Card Regular -->
                <div class="card card-cascade border-none">

                    <!-- Card content -->
                    <div class="card-body card-body-cascade">


                        @foreach($shelter->addressable as $address)
                            <p class="card-text">{{$address ->street . ' '. $address ->number }} <span class="font-weight-bold"> {{$address->city->name}}</span> ({{$address->city->province->name}})</p>
                        @endforeach

                        @if(isset($shelter->addressable[0]))
                            <a href="#" id="scrollToMap" class="indigo-text">Pokaż mapę <i class="ml-2 fa-lg fas fa-map-marker-alt"></i></a>
                            <hr>
                         @endif



                        <h4 class="card-title text-center mb-4">Kontakt</h4>
                        <p class="card-text">{{$shelter->user->email}}</p>

                        @if(isset($shelter->user->phones[0]))
                            <button id="showPhoneNumbers" data-user-id="{{$shelter->user->id}}" class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">Wyświetl numery <i class=" ml-2 fas fa-lg text-white fa-phone"></i></button>
                            <div id="before_send" style="display: none;">
                                <p>Ładowanie <i class="fas fa-spinner fa-spin"></i></p>
                            </div>
                            <div id="user_phones">

                            </div>
                        @endif

                            @if(isset($shelter->openHoursable[0]))
                            <hr>
                            <h4 class="card-title text-center mb-4">Godziny otwarcia</h4>
                                <ul class="list-group list-group-flush card-text">
                                    @foreach($shelter->openHoursable as $openHour)
                                        <li class="list-group-item mb-0 d-flex justify-content-between">{{$openHour->day->name}} <span> {{$openHour->open_time}}-{{$openHour->close_time}}</span></li>
                                    @endforeach
                                </ul>
                            @endif
                    </div>

                </div>
            </div>


        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="container">
            <div class="row">
                @if(isset($animalsForAdoption[0]))
                <div id="animalsForAdoption" class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Zwierzaki do adopcji</h2>
                </div>
                <div class="col-lg-12 col-md-12 mb-4 pl-4 pr-4">
                    <div class="row">
                        @foreach($animalsForAdoption as $animalForAdoption)

                            <div class="col-lg-3 col-md-6 p-1">
                                <div class="card border-none ovf-hidden animal-ovf">

                                    <!-- Card image -->
                                    <div class="view overlay">
                                        @auth

                                            @if( $animalForAdoption->isFavourite() )
                                                {{--<a href="{{ route('unlike',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Unlike this object</a>--}}
                                                <button
                                                    class="m-0 btn notfavouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                    tabindex="0" data-animal-id="{{$animalForAdoption->id}}">
                                                    <i class="fas fa-lg fa-heart pink-text"></i>
                                                </button>
                                            @else
                                                {{--<a href="{{ route('like',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Like this object</a>--}}
                                                <button
                                                    class="m-0 btn favouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                    tabindex="0" data-animal-id="{{$animalForAdoption->id}}">
                                                    <i class="fas fa-lg fa-heart text-white"></i>
                                                </button>
                                            @endif

                                        @else

                                            <a href="{{ route('login') }}"
                                               class="m-0 btn favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">
                                                <i class="fas fa-heart mt-1 fa-lg text-white"></i>
                                            </a>

                                        @endauth
                                        <img class="card-img-top" src="{{ $animalForAdoption->photos->first()->path ?? $placeholder}}" alt="{{ $animalForAdoption->name }}" title="{{ $animalForAdoption->name }}">
                                        <a href="{{ route('animal',['id'=>$animalForAdoption->id])}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>

                                        <div class="card-body">
                                            <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                            <!-- Title -->
                                            <h4 class="card-title mb-2">{{ $animalForAdoption->name }}
                                                @if ($animalForAdoption->animalDictionarySpecies->animal_dictionary->gender->id == 1)
                                                    <i class="ml-3 fas fa-lg fa-mars color-male"></i>
                                                @else
                                                    <i class="ml-3 fas fa-lg fa-venus color-female"></i>
                                                @endif
                                            </h4>

                                            <div class="d-flex flex-wrap mb-3">
                                                {!! '<p class="card-text w-50 mb-1">Wiek: <span class="font-weight-bold color-mid-grey ">'. $animalForAdoption->age .' lat/a</span></p>' ?? ''!!}
                                                {!! '<p class="card-text w-50 mb-1">Wielkość: <span class="font-weight-bold color-mid-grey ">'. $animalForAdoption->animalSize->name .'</span></p>' ?? ''!!}
                                            </div>

                                            <p class="card-text d-lg-block d-md-block d-sm-none d-none">{{ str_limit($animalForAdoption->description, 77) }}</p>

                                            <!-- Button -->
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('animal',['id'=>$animalForAdoption->id])}}" class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
                                                <a href="{{ route('animal',['id'=>$animalForAdoption->id])}}" class="m-0 btn pink lighten-1 btn-rounded text-white p3-4 p3-4 waves-effect waves-light text-transform-none">Adoptuj wirtualnie</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
                @endif



                @if(isset($animalsAdopted[0]))

                    <div id="animalsAdopted" class="col-lg-12 col-md-12 mb-4">
                        <h2 class="color-mid-grey">Nasi szczęściarze</h2>
                    </div>
                    <div class="col-lg-12 col-md-12 mb-4 pl-4 pr-4">
                        <div class="row">
                            @foreach($animalsAdopted as $animalAdopted)

                                <div class="col-lg-3 col-md-3 p-1">
                                    <div class="card border-none ovf-hidden animal-ovf">

                                        <!-- Card image -->
                                        <div class="view overlay">
                                            @auth

                                                @if( $animalAdopted->isFavourite() )
                                                    {{--<a href="{{ route('unlike',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Unlike this object</a>--}}
                                                    <button
                                                        class="m-0 btn notfavouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                        tabindex="0" data-animal-id="{{$animalAdopted->id}}">
                                                        <i class="fas fa-lg fa-heart pink-text"></i>
                                                    </button>
                                                @else
                                                    {{--<a href="{{ route('like',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Like this object</a>--}}
                                                    <button
                                                        class="m-0 btn favouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                        tabindex="0" data-animal-id="{{$animalAdopted->id}}">
                                                        <i class="fas fa-lg fa-heart text-white"></i>
                                                    </button>
                                                @endif

                                            @else

                                                <a href="{{ route('login') }}"
                                                   class="m-0 btn favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">
                                                    <i class="fas fa-heart mt-1 fa-lg text-white"></i>
                                                </a>

                                            @endauth
                                            <img class="card-img-top" src="{{ $animalAdopted->photos->first()->path ?? $placeholder}}" alt="{{ $animalAdopted->name }}" title="{{ $animalAdopted->name }}">
                                            <a href="{{ route('animal',['id'=>$animalAdopted->id])}}">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>

                                            <div class="card-body">
                                                <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                                <!-- Title -->
                                                <h4 class="card-title mb-2">{{ $animalAdopted->name }}
                                                    @if ($animalAdopted->animalDictionarySpecies->animal_dictionary->gender->id == 1)
                                                        <i class="ml-3 fas fa-lg fa-mars color-male"></i>
                                                    @else
                                                        <i class="ml-3 fas fa-lg fa-venus color-female"></i>
                                                    @endif
                                                </h4>

                                                <div class="d-flex flex-wrap mb-3">
                                                    {!! '<p class="card-text w-50 mb-1">Wiek: <span class="font-weight-bold color-mid-grey ">'. $animalAdopted->age .' lat/a</span></p>' ?? ''!!}
                                                    {!! '<p class="card-text w-50 mb-1">Wielkość: <span class="font-weight-bold color-mid-grey ">'. $animalAdopted->animalSize->name .'</span></p>' ?? ''!!}
                                                </div>

                                                <p class="card-text">{{ str_limit($animalAdopted->description, 77) }}</p>

                                                <!-- Button -->
                                                <div class="d-flex justify-content-around">
                                                    <a href="{{ route('animal',['id'=>$animalAdopted->id])}}" class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
                                                    <a href="{{ route('animal',['id'=>$animalAdopted->id])}}" class="m-0 btn pink lighten-1 btn-rounded text-white p3-4 p3-4 waves-effect waves-light text-transform-none">Adoptuj wirtualnie</a>
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

    <div class="container">
        <div class="container-fluid mt-5 mb-5 p-0" id="map">

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


                @if(isset($shelter->addressable[0]))
                    @if(isset($shelter->addressable[0]->lon) && isset($shelter->addressable[0]->lat))
                        @php
                            $lon = $shelter->addressable[0]->lon;
                            $lat = $shelter->addressable[0]->lat;
                        @endphp
                        <div id="full-width-map" class="z-depth-1-half map-container" style="height: 500px">
                            <iframe src="https://maps.google.com/maps?q={{$lon}},{{$lat}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                    style="border:0" allowfullscreen></iframe>
                        </div>
                @endif
            @endif

            <!-- Google Maps -->

                <!-- Google Maps -->

            </section>
            <!-- Section: Block Content -->

        </div>

        <!-- Modal -->
        <div class="modal fade" id="report_violation_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Zgłoś naruszenie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="report_violation_spam" name="report_violation">
                            <label class="custom-control-label" for="report_violation_spam">spam</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="report_violation_wrong_category" name="report_violation">
                            <label class="custom-control-label" for="report_violation_wrong_category">Niewłaściwa kategoria</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="report_violation_outdated" name="report_violation">
                            <label class="custom-control-label" for="report_violation_outdated">Ogłoszenie nieaktualne</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-start">
                        <button class="btn indigo lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">Wyślij <i class="ml-2 fas fa-lg text-white fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->


    </div>


    @push('scripts')
        <script>
            $('.shelter-item').on('click', function () {
                let shelter_id = $(this).attr('data-shelter-item');
                let shelter_route = $('#shelter_route');
                let shelter_route_array = shelter_route.attr('href').split("/");
                shelter_route_array.pop();
                let link_without_shelter_id = shelter_route_array.join('/');
                shelter_route.attr('href', link_without_shelter_id+'/'+shelter_id);
                shelter_route[0].click();
            })
        </script>

@endpush
@endsection


