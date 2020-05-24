
@extends('layouts.indexFronend')

@section('content')
    <div id="ModuleName" data-moduleName="frontendIndex">


        <div class="container mt-5 mb-5">

            @if (session('norooms'))
                <p class="text-center red bolded">
                    {{ session('norooms') }}
                </p>
            @endif
            <div class="row mb-5">
                <div class="col-lg-12 col-md-12 mb-4 p-0">
                    <h2 class="text-title m-0">Polecane zwierzaki</h2>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="row promoted_animals">
                        @foreach($animals as $animal)

                            <div class="col-lg-3 col-md-3 p-1">
                                <div class="card border-none ovf-hidden animal-ovf">

                                    <!-- Card image -->
                                    <div class="view overlay">
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

                                        <div class="w-100 pt-2 pl-2 pr-5 pb-2 d-flex bg-black-50 shelter-info">
                                            <div class="card-shelter-photo"
                                                 style="background-image: url({{ $animal->photos->first()->path ?? $placeholderShelter}});"></div>
                                            <div class="ml-3 d-flex align-items-center">

                                                @if($animal->animalable_type == 'App\Shelter')
                                                    <a href="{{ route('shelter',['id'=>$animal->animalable_id])}}"
                                                       class="text-white">{{$animal->animalable->name }} </a>
                                                @elseif($animal->animalable_type == 'App\User')
                                                    <a href="{{ route('user',['id'=>$animal->animalable_id])}}"
                                                       class="text-white">{{$animal->animalable->name }} {{$animal->animalable->surname}} </a>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="position-relative">
                                            <img class="card-img-top"
                                                 src="{{ $animal->photos->first()->path ?? $placeholder}}"
                                                 alt="{{ $animal->name }}" title="{{ $animal->name }}">

                                        </div>

                                        <a href="{{ route('animal',['id'=>$animal->id])}}">
                                            <div class="mask rgba-white-slight mask-animal">

                                            </div>
                                        </a>

                                        <div class="card-body">
                                            <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                            <!-- Title -->
                                            <h4 class="card-title mb-2">{{ $animal->name }}
                                                @if ($animal->animalDictionarySpecies->animal_dictionary->gender->id == 1)
                                                    <i class="ml-3 fas fa-lg fa-mars color-male"></i>
                                                @else
                                                    <i class="ml-3 fas fa-lg fa-venus color-female"></i>
                                                @endif
                                            </h4>

                                            <div class="d-flex flex-wrap mb-3">
                                                {{--                                        {!! '<p class="card-text w-50 mb-1" >Ganutek: <span class="font-weight-bold color-mid-grey ">'. $animal->animalDictionarySpecies->animal_dictionary->name .'</span></p>' ?? ''!!}--}}
                                                {!! '<p class="card-text w-50 mb-1">Wiek: <span class="font-weight-bold color-mid-grey ">'. $animal->age .' lat/a</span></p>' ?? ''!!}
                                                {!! '<p class="card-text w-50 mb-1">Wielkość: <span class="font-weight-bold color-mid-grey ">'. $animal->animalSize->name .'</span></p>' ?? ''!!}
                                            </div>

                                            <p class="card-text">{{ str_limit($animal->description, 77) }}</p>

                                            <!-- Button -->
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('animal',['id'=>$animal->id])}}"
                                                   class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
                                                <a href="{{ route('animal',['id'=>$animal->id])}}"
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
            <hr>
            <div class="row mt-4 mb-5">
                <div class="col-lg-12 col-md-12 mb-4 p-0">
                    <h2 class="text-title m-0">Polecane schroniska</h2>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="row promoted_shelter">
                        @foreach($shelters as $shelter)

                            <div class="col-lg-3 col-md-3 p-1">
                                <div class="card border-none ovf-hidden animal-ovf">

                                    <!-- Card image -->
                                    <div class="view overlay">
                                        @auth

                                            @if( $shelter->isFavourite() )
                                                {{--<a href="{{ route('unlike',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Unlike this object</a>--}}
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

                                        <div class="w-100 pt-2 pl-2 pr-5 pb-2 d-flex bg-black-50 shelter-info">

                                        </div>

                                        <div class="position-relative">
                                            <img class="card-img-top"
                                                 src="{{ $shelter->photos->first()->path ?? $placeholderShelter}}"
                                                 alt="{{ $shelter->name }}" title="{{ $shelter->name }}">

                                        </div>

                                        <a href="{{ route('shelter',['id'=>$shelter->id])}}">
                                            <div class="mask rgba-white-slight mask-animal">

                                            </div>
                                        </a>

                                        <div class="card-body">

                                            <!-- Title -->
                                            <h4 class="card-title mb-1">{{ $shelter->name }}</h4>
                                            <!-- Text -->
                                            @if(isset($shelter->addressable[0]))
                                                <p class="card-text mb-3">{{$shelter->addressable[0]->city->name. ' ' .  '('.$shelter->addressable[0]->city->province->name.')'}}</p>
                                            @endif
                                            <p class="card-text">{{ str_limit($shelter->description, 77) }}</p>
                                            <!-- Button -->
                                            <a href="{{ route('shelter',['id'=>$shelter->id])}}"
                                               class="m-0 btn indigo lighten-1 btn-rounded text-white pl-4 pr-4 waves-effect waves-light text-transform-none">Odwiedź
                                                schronisko</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <hr>
            <div class="row mt-5 mb-5">
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                            <img style="width: 350px; height: 350px;" class="img-fluid z-depth-1 rounded-circle"
                                 src="{{asset('images/shelter.jpg')}}" alt="Weterynarz">
                        </div>
                        <div class="col-lg-6 col-md-6 my-auto">
                            <div class="pl-5 pr-5">
                                <h3 class="text-title text-center">Prowadzisz schronisko?</h3>
                                <p class="lead text-secondary text-center font-weight-light">Załóż konto i usprawnij
                                    adopcje swoich podopiecznych.</p>
                            </div>

                            <div class="d-flex justify-content-center w-100">
                                <a href="{{ route('shelter',['id'=>$shelter->id])}}"
                                   class="w-100 btn indigo lighten-1 btn-rounded text-white pl-4 pr-4 waves-effect waves-light text-transform-none m-3">Odwiedź
                                    się więcej</a>
                                <a href="{{ route('joinShelter')}}"
                                   class=" w-100 btn indigo lighten-1 btn-rounded text-white pl-4 pr-4 waves-effect waves-light text-transform-none m-3">Dołącz do nas</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 my-auto">
                            <div class="pl-5 pr-5">
                                <h3 class="text-title text-center">Jesteś weterynarzem?</h3>
                                <p class="lead text-secondary text-center font-weight-light">Dodaj swoją przychodnię
                                    weteterynaryją i rejestruj pacjentów online.</p>
                            </div>

                            <div class="d-flex justify-content-center w-100">
                                <a href="{{ route('shelter',['id'=>$shelter->id])}}"
                                   class="w-100 btn indigo lighten-1 btn-rounded text-white pl-4 pr-4 waves-effect waves-light text-transform-none m-3">Odwiedź
                                    się więcej</a>
                                <a href="{{ route('shelter',['id'=>$shelter->id])}}"
                                   class=" w-100 btn indigo lighten-1 btn-rounded text-white pl-4 pr-4 waves-effect waves-light text-transform-none m-3">Załóż
                                    konto</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                            <img style="width: 350px; height: 350px;" class="img-fluid z-depth-1 rounded-circle"
                                 src="{{asset('images/vet.jpg')}}" alt="Weterynarz">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">

            <section class="p-3">
                <div class="row d-flex justify-content-center align-items-center mb-4">

                    <div class="col-md-6 col-lg-2 text-center">
                        <h4 class="h1 font-weight-normal mb-3">
                            <i class="fas fa-home indigo-text lighten-1"></i>
                            <span class="d-inline-block count-up" data-from="0"
                                  data-to="{{$counters['counter_shelters'] - 1}}"
                                  data-time="2000">{{$counters['counter_shelters']}}</span>
                        </h4>
                        <p class="font-weight-normal text-muted">Ponad {{$counters['counter_shelters'] - 1}} schronisk
                            jest już z nami.</p>

                    </div>

                    <div class="col-md-6 col-lg-2 text-center">
                        <h4 class="h1 font-weight-normal mb-3">
                            <i class="fas fa-dog indigo-text lighten-1"></i>
                            <span class="d-inline-block count1" data-from="0" data-to="{{$counters['counter_animals']}}"
                                  data-time="2000">{{$counters['counter_animals']}}</span>
                        </h4>
                        <p class="font-weight-normal text-muted">{{$counters['counter_animals']}} zwierząt wciąż czeka
                            na dom.</p>
                    </div>

                    <div class="col-md-6 col-lg-4 text-center ">
                        <div class="p-5 rounded pink lighten-1 w-75 mx-auto z-depth-1">
                            <h2 class="text-white">Razem zebraliśmy:</h2>
                            <h2 class="display-4 text-white">100.00 zł</h2>

                            <div class="d-flex align-items-center justify-content-center">
                                <p class="text-white mb-0">Dziękujemy! </p>
                                <i class="ml-3 fas fa-2x text-white fa-heart fa-beat"></i>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-2 text-center">
                        <h4 class="h1 font-weight-normal mb-3">
                            <i class="fas fa-pencil-ruler indigo-text lighten-1"></i>
                            <span class="d-inline-block count2" data-from="0" data-to="330" data-time="2000">330</span>
                        </h4>
                        <p class="font-weight-normal text-muted">Reusable Component</p>
                    </div>

                    <div class="col-md-6 col-lg-2 text-center">
                        <h4 class="h1 font-weight-normal mb-3">
                            <i class="fab fa-react indigo-text lighten-1"></i>
                            <span class="d-inline-block count3" data-from="0" data-to="430" data-time="2000">430</span>
                        </h4>
                        <p class="font-weight-normal text-muted">Crafted Element</p>
                    </div>

                </div>

            </section>
            <!--Section: Content-->


        </div>
    </div>
@endsection

