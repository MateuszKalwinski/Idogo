@extends('layouts.backend')

@section('content')


<div class="container-fluid mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h2 class="color-mid-grey">Ulubione zwierzaki</h2>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    @if(count($favourite->favourite_animals) == 0)
                        <div class="col-lg-12 col-md-12">
                            <div class="card border-none mb-3">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Brak ulubionych zwierzaków</h4>
                                    <div class="mb-4">
                                        <p class="card-text">Wygląda na to, że nie masz jeszcze ulubionych zwierzaków.</p>
                                        <p class="card-text">Mamy naprawde sporo świetnych zwierzaków, które szukają nowego dumu.</p>
                                        <p class="card-text">Na pewno kilka przypadnie Ci do gustu!</p>
                                    </div>
                                    <a href="{{ route('animals')}}"
                                       class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Zobacz zwierzaki</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach($favourite->favourite_animals as $favourite_animal)

                        <div class="col-lg-3 col-md-3 p-1 mb-3">
                            <div class="card border-none ovf-hidden animal-ovf">

                                <!-- Card image -->
                                <div class="view overlay">
                                    @auth

                                        @if( $favourite_animal->isFavourite() )
                                            {{--<a href="{{ route('unlike',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Unlike this object</a>--}}
                                            <button
                                                class="m-0 btn notfavouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                tabindex="0" data-animal-id="{{$favourite_animal->id}}">
                                                <i class="fas fa-lg fa-heart pink-text"></i>
                                            </button>
                                        @else
                                            {{--<a href="{{ route('like',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Like this object</a>--}}
                                            <button
                                                class="m-0 btn favouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                tabindex="0" data-animal-id="{{$favourite_animal->id}}">
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
                                             style="background-image: url({{ $favourite_animal->photos->first()->path ?? $placeholderShelter}});"></div>
                                        <div class="ml-3 d-flex align-items-center">

                                            @if($favourite_animal->animalable_type == 'App\Shelter')
                                                <a href="{{ route('shelter',['id'=>$favourite_animal->animalable_id])}}"
                                                   class="text-white">{{$favourite_animal->animalable->name }} </a>
                                            @elseif($favourite_animal->animalable_type == 'App\User')
                                                <a href="{{ route('user',['id'=>$favourite_animal->animalable_id])}}"
                                                   class="text-white">{{$favourite_animal->animalable->name }} {{$favourite_animal->animalable->surname}} </a>
                                            @endif

                                        </div>
                                    </div>
                                    <img class="card-img-top"
                                         src="{{ $favourite_animal->photos->first()->path ?? $placeholder}}"
                                         alt="{{ $favourite_animal->name }}" title="{{ $favourite_animal->name }}">
                                    <a href="{{ route('animal',['id'=>$favourite_animal->id])}}">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>

                                    <div class="card-body">
                                        <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                        <!-- Title -->
                                        <h4 class="card-title mb-2">{{ $favourite_animal->name }}
                                            @if ($favourite_animal->animalDictionarySpecies->animal_dictionary->gender->id == 1)
                                                <i class="ml-3 fas fa-lg fa-mars color-male"></i>
                                            @else
                                                <i class="ml-3 fas fa-lg fa-venus color-female"></i>
                                            @endif
                                        </h4>

                                        <div class="d-flex flex-wrap mb-3">
                                            {{--                                        {!! '<p class="card-text w-50 mb-1" >Ganutek: <span class="font-weight-bold color-mid-grey ">'. $animal->animalDictionarySpecies->animal_dictionary->name .'</span></p>' ?? ''!!}--}}
                                            {!! '<p class="card-text w-50 mb-1">Wiek: <span class="font-weight-bold color-mid-grey ">'. $favourite_animal->age .' lat/a</span></p>' ?? ''!!}
                                            {!! '<p class="card-text w-50 mb-1">Wielkość: <span class="font-weight-bold color-mid-grey ">'. $favourite_animal->animalSize->name .'</span></p>' ?? ''!!}
                                        </div>

                                        <p class="card-text">{{ str_limit($favourite_animal->description, 77) }}</p>

                                        <!-- Button -->
                                        <div class="d-flex justify-content-around">
                                            <a href="{{ route('animal',['id'=>$favourite_animal->id])}}"
                                               class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
                                            <a href="{{ route('animal',['id'=>$favourite_animal->id])}}"
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

        <div class="row mt-2">
            <div class="col-lg-12 col-md-12 mb-4">
                <h2 class="color-mid-grey">Ulubione schroniska</h2>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    @if(count($favourite->favourite_shelters) == 0)
                        <div class="col-lg-12 col-md-12">
                            <div class="card border-none mb-3">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Brak ulubionych schronisk</h4>
                                    <div class="mb-4">
                                        <p class="card-text">Wygląda na to, że nie masz jeszcze ulubionych schronisk.</p>
                                        <p class="card-text">Jeśli, żadne schronisko nie przypadło Ci do gustu możesz je zaprosić klikając przycik "Zaproś schronisko".</p>
                                        <p class="card-text">Zobacz też nasze pozostałe schroniska.</p>
                                    </div>

                                    <div class="d-flex justify-content-start">
                                        <a href="{{ route('shelters')}}"
                                           class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none mr-1">Zobacz schroniska</a>
                                        <a href="#" class="m-0 btn pink lighten-1 btn-rounded text-white p3-4 p3-4 waves-effect waves-light text-transform-none ml-1">Zaproś schronisko</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach($favourite->favourite_shelters as $favourite_shelter)

                        <div class="col-lg-3 col-md-3 p-1">
                            <div class="card border-none ovf-hidden animal-ovf">

                                <!-- Card image -->
                                <div class="view overlay">
                                    @auth

                                        @if( $favourite_shelter->isFavourite() )
                                            {{--<a href="{{ route('unlike',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Unlike this object</a>--}}
                                            <button
                                                class="m-0 btn notfavouriteShelter favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                tabindex="0" data-shelter-id="{{$favourite_shelter->id}}">
                                                <i class="fas fa-lg fa-heart pink-text"></i>
                                            </button>
                                        @else
                                            {{--<a href="{{ route('like',['id'=>$object->id,'type'=>'App\TouristObject']) }}" class="btn btn-primary btn-xs top-buffer">Like this object</a>--}}
                                            <button
                                                class="m-0 btn favouriteShelter favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                tabindex="0" data-shelter-id="{{$favourite_shelter->id}}">
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
                                             src="{{ $favourite_shelter->photos->first()->path ?? $placeholderShelter}}"
                                             alt="{{ $favourite_shelter->name }}" title="{{ $favourite_shelter->name }}">

                                    </div>

                                    <a href="{{ route('shelter',['id'=>$favourite_shelter->id])}}">
                                        <div class="mask rgba-white-slight mask-animal">

                                        </div>
                                    </a>

                                    <div class="card-body">

                                        <!-- Title -->
                                        <h4 class="card-title mb-1">{{ $favourite_shelter->name }}</h4>
                                        <!-- Text -->
                                        @if(isset($favourite_shelter->addressable[0]))
                                            <p class="card-text mb-3">{{$favourite_shelter->addressable[0]->city->name. ' ' .  '('.$favourite_shelter->addressable[0]->city->province->name.')'}}</p>
                                        @endif
                                        <p class="card-text">{{ str_limit($favourite_shelter->description, 77) }}</p>
                                        <!-- Button -->
                                        <a href="{{ route('shelter',['id'=>$favourite_shelter->id])}}"
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
    </div>
</div>
@endsection
