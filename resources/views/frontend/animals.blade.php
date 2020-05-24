@extends('layouts.menu')

@section('content')
<div id="ModuleName" data-moduleName="frontendAnimals">

    <div class="container  mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h1 class="color-mid-grey my-auto">Znaleźliśmy <span
                        class="pink-text display-4">{{$animals->total()}}</span> zwierzaków</h1>
            </div>

            <div class="col-lg-9 col-md-9 ">

                <div class="row">

                    @if(count($animals) == 0)
                        <div class="col-lg-12 col-md-12 p-3">
                            <div class="card border-none mb-3">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Usp! Nie znaleźliśmy zwierzaków spełniających Twoje kryteria.</h4>
                                    <div class="mb-4">
                                        <p class="card-text">Możemy poinformować Cię gdy tylko pojawi się zwierzak, którego szukasz.</p>
                                        <p class="card-text">Aby to zrobić wypełnij poniższy formularz.</p>
                                    </div>

                                    <form id="contact-form" name="contact-form" action="#" method="POST">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="name" name="name" class="form-control">
                                                    <label for="name" class="">Imie</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="md-form mb-0">
                                                    <input type="text" id="email" name="email" class="form-control">
                                                    <label for="email" class="">Email</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-center text-md-left mt-3">
                                            <button
                                                class="btn indigo lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                                Poinformuj mnie <i class="ml-2 fas fa-lg text-white fa-bell"></i></button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach($animals as $animal)

                        <div class="col-lg-12 col-md-12 p-3">
                            <div class="card border-none ovf-hidden animal-ovf">

                                <!-- Card image -->
                                <div class="view overlay d-flex">
                                    <div class="w-40">
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
                                                    <i class="fas fa-lg fa-heart text-muted"></i>
                                                </button>
                                            @endif

                                        @else

                                            <a href="{{ route('login') }}"
                                               class="m-0 btn favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">
                                                <i class="fas fa-heart mt-1 fa-lg text-muted"></i>
                                            </a>

                                        @endauth
                                        <div class="w-40 pt-2 pl-2 pr-5 pb-2 d-flex bg-black-50 shelter-info">
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
                                        <img class="card-img-top"
                                             src="{{ $animal->photos->first()->path ?? $placeholder}}"
                                             alt="{{ $animal->name }}" title="{{ $animal->name }}">
                                        <a href="{{ route('animal',['id'=>$animal->id])}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="w-60">

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

                                            <div class="d-flex flex-wrap">
                                                <ul class="d-flex flex-row flex-wrap mb-0 p-0"
                                                    style=" list-style-type: none;">
                                                    @if( $animal->animalBreed->hasBreedDescription($animal->animalBreed->id) )

                                                        <li class="pr-4 p-1 card-text lead z-index-1000">Rasa :
                                                            <span class="font-weight-bold color-mid-grey ml-1">
                                                                <a class="" href="{{ route('breedDescription',['id'=>$animal->animalBreed->id]) }}">{{$animal->animalBreed->name}}</a>
                                                            </span>
                                                        </li>

                                                    @else
                                                        {!! '<li class="pr-4 p-1 card-text lead">Rasa: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalBreed->name .'</span></li>' ?? ''!!}

                                                    @endif

                                                    {!! '<li class="pr-4 p-1 card-text lead">Wiek: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->age .' lat</span></li>' ?? ''!!}
                                                    {!! '<li class="pr-4 p-1 card-text lead">Wielkość: <span class="font-weight-bold color-mid-grey ml-1">'. $animal->animalSize->name .'</span></li>' ?? ''!!}
                                                </ul>
                                            </div>
                                            <hr class="mt-0">
                                            <p class="card-text">{{ str_limit($animal->description, 110) }}</p>


                                            <!-- Button -->
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('animal',['id'=>$animal->id])}}"
                                                   class="mt-0 mb-0 mr-2 ml-2 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
                                                <a href="{{ route('animal',['id'=>$animal->id])}}"
                                                   class="m-0 mb-0 mr-2 ml-2 btn pink lighten-1 btn-rounded text-white p3-4 p3-4 waves-effect waves-light text-transform-none">Adoptuj
                                                    wirtualnie</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endforeach


                </div>
            </div>

            <div class="col-lg-3 col-md-3 mt-3">
                <div class="card card-cascade border-none mb-5">

                    <div class="card-body card-body-cascade">
                        <form class="" style="color: #757575;" action="{{ route('searchAnimals') }}" method="get">

                            @if(isset($searchData['species']))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Gatunek</p>
                                    <select id="animalSpecies" name="animalSpecies" class="mdb-select md-form m-0"
                                            searchable="Gatunek">
                                        <option value="">Bez znaczenia</option>
                                        @foreach($searchData['species'] as $species)
                                            <option value="{{$species->id}}"
                                                    @if( app('request')->input('animalSpecies')  == $species->id) selected="selected" @endif>{{$species->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif

                            @if(isset($searchData['breeds']))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Rasa</p>
                                    <select id="animalBreeds" name="animalBreeds" class="mdb-select md-form m-0"
                                            searchable="Rasa">
                                        <option value="" selected>Bez znaczenia</option>
                                        @foreach($searchData['breeds'] as $breed)
                                            <option value="{{$breed->id}}"
                                                    data-species-id="{{$breed->species_id}}"
                                                    @if( app('request')->input('animalBreeds')  == $breed->id) selected="selected" @endif>{{$breed->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif

                            @if(isset($searchData['age']))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Wiek</p>
                                    <select id="animalAge" name="animalAge" class="mdb-select md-form m-0"
                                            searchable="Rasa">
                                        <option value="" selected>Bez znaczenia</option>
                                        @foreach($searchData['age'] as $age)
                                            <option value="{{$age->id}}"
                                                    @if( app('request')->input('animalAge')  == $age->id) selected="selected" @endif>{{$age->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif

                            @if(isset($searchData['sizes']))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Wielkość</p>
                                    <select id="animalSizes" name="animalSizes" class="mdb-select md-form m-0"
                                            searchable="Wielkość">
                                        <option value="" selected>Bez znaczenia</option>
                                        @foreach($searchData['sizes'] as $sizes)
                                            <option value="{{$sizes->id}}"
                                                    @if( app('request')->input('animalSizes')  == $sizes->id) selected="selected" @endif>{{$sizes->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif

                            @if(isset($searchData['genders']))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Płeć</p>
                                    <select id="animalGender" name="animalGender" class="mdb-select md-form m-0"
                                            searchable="Płeć">
                                        <option value="" selected>Bez znaczenia</option>
                                        @foreach($searchData['genders'] as $gender)
                                            <option value="{{$gender->id}}"
                                                    @if( app('request')->input('animalGender')  == $gender->id) selected="selected" @endif>{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif

                            @if(isset($searchData['colors']))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Kolor</p>
                                    <select id="animalColor" name="animalColor" class="mdb-select md-form m-0"
                                            searchable="Kolor">
                                        <option value="" selected>Bez znaczenia</option>
                                        @foreach($searchData['colors'] as $color)
                                            <option value="{{$color->id}}"
                                                    @if( app('request')->input('animalColor')  == $color->id) selected="selected" @endif>{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif

                            @if(isset($searchData['fur']))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Długość furta</p>
                                    <select id="animalFurs" name="animalFurs" class="mdb-select md-form m-0"
                                            searchable="Długość furta">
                                        <option value="" selected>Bez znaczenia</option>
                                        @foreach($searchData['fur'] as $fur)
                                            <option value="{{$fur->id}}"
                                                    @if( app('request')->input('animalFurs')  == $fur->id) selected="selected" @endif>{{$fur->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif
                            <div class="md-form mb-4">
                                @if(isset($searchData['characteristicDictionary']))
                                    @foreach($searchData['characteristicDictionary'] as $character)
                                        <div class="form-check form-check-inline mb-2">

                                            <input type="checkbox" class="form-check-input"
                                                   id="{{'option_'.$character->id}}"
                                                   name="{{'option_'.$character->id}}" value="1"
                                                   @if( app('request')->input('option_'.$character->id)  == 'on') checked @endif>
                                            <label class="form-check-label"
                                                   for="{{'option_'.$character->id}}">{{$character->name}}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <button id="searchAnimals"
                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">
                                Szukaj<i class=" ml-2 fas fa-lg text-white fa-search fa-flip-horizontal"></i></button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-lg-12">
                {{ $animals->links() }}

            </div>


        </div>


    </div>
</div>
@endsection


