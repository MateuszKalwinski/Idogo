@extends('layouts.menu')

@section('content')
<div id="ModuleName" data-moduleName="frontendBreedDescription">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">

                <h1 class="color-mid-grey my-auto">Rasa: <span
                        class="pink-text display-4">{{$breedDescription->name}}</span>
                </h1>

            </div>

            <div class="col-lg-8 col-md-8 ">

                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5">
                        <div class="card border-none">
                            @if(empty($breedDescription->photo))
                                <img class="w-100" src="{{ $placeholderBreed}}" alt="">
                            @else
                                {{--                                    @foreach($breedDescription->photos as $photo)--}}
                                {{--                                        <img src="{{ $photo->path ?? $placeholder}}" alt="">--}}
                                {{--                                    @endforeach--}}
                            @endif


                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <ul class="nav md-tabs nav-justified indigo lighten-1 mx-0 mb-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link active" href="#nature">Charakter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#health">Zdrowie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#history">Historia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#fact">Ciekawostki</a>
                            </li>
                        </ul>
                        <div class="card border-none">
                            <div class="card-body pb-0">

                            </div>
                        </div>
                        @if( $breedDescription->breedDescription->nature)
                            <div id="nature" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Charakter:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->nature !!}
                                </div>
                            </div>
                        @endif

                        @if($breedDescription->breedDescription->skill)
                            <div id="skill" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Umiejętności:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->skill !!}
                                </div>
                            </div>
                        @endif

                        @if($breedDescription->breedDescription->raising)
                            <div id="raising" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Wychowanie:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->raising !!}
                                </div>
                            </div>
                        @endif

                        @if($breedDescription->breedDescription->perfect_owner)
                            <div id="perfect_owner" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Dla kogo ta rasa:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->perfect_owner !!}
                                </div>
                            </div>
                        @endif

                        @if($breedDescription->breedDescription->health)
                            <div id="health" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Zdrowie:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->health !!}
                                </div>
                            </div>
                        @endif

                        @if($breedDescription->breedDescription->diet)
                            <div id="diet" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Żywienie:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->diet !!}
                                </div>
                            </div>
                        @endif

                        @if($breedDescription->breedDescription->care)
                            <div id="care" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Pielęgnacja:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->care !!}
                                </div>
                            </div>
                        @endif

                        @if($breedDescription->breedDescription->history)
                            <div id="history" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Historia:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->history !!}
                                </div>
                            </div>
                        @endif

                        @if($breedDescription->breedDescription->fact)
                            <div id="fact" class="card border-none">
                                <div class="card-body">
                                    <h3 class="card-title">Ciekawostki:</h3>
                                    <hr>
                                    {!! $breedDescription->breedDescription->fact !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">

                <!-- Card Regular -->
                <div class="card card-cascade border-none mb-5">

                    <div class="card-body card-body-cascade">

                        <a href="{{route('searchAnimals').'?animalSpecies=&animalBreeds='. $breedDescription->id .'&animalAge=&animalSizes=&animalGender=&animalColor=&animalFurs='}}"
                           class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">
                            Zobacz zwierzaki</a>
                        <hr>
                        <h4 class="card-title text-center mb-4">Udostępnij</h4>

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
            </div>
        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="container">
            <div class="row">
                @if(isset($animalsWithBreed[0]))
                <div class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Zwierzaki rasy <span class="pink-text">{{$breedDescription->name}}</span>
                    </h2>
                </div>
                <div class="col-lg-12 col-md-12 pl-4 pr-4">
                    <div class="row">
                        @foreach($animalsWithBreed as $animalWithBreed)

                            <div class="col-lg-3 col-md-3 p-1">
                                <div class="card border-none ovf-hidden animal-ovf">
                                    <div class="view overlay">
                                        @auth

                                            @if( $animalWithBreed->isFavourite() )
                                                <button
                                                    class="m-0 btn notfavouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                    tabindex="0" data-animal-id="{{$animalWithBreed->id}}">
                                                    <i class="fas fa-lg fa-heart pink-text"></i>
                                                </button>
                                            @else
                                                <button
                                                    class="m-0 btn favouriteAnimal favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none"
                                                    tabindex="0" data-animal-id="{{$animalWithBreed->id}}">
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
                                                 style="background-image: url({{ $animalWithBreed->photos->first()->path ?? $placeholderShelter}});"></div>
                                            <div class="ml-3 d-flex align-items-center">

                                                @if($animalWithBreed->animalable_type == 'App\Shelter')
                                                    <a href="{{ route('shelter',['id'=>$animalWithBreed->animalable_id])}}"
                                                       class="text-white">{{$animalWithBreed->animalable->name }} </a>
                                                @elseif($animalWithBreed->animalable_type == 'App\User')
                                                    <a href="{{ route('user',['id'=>$animalWithBreed->animalable_id])}}"
                                                       class="text-white">{{$animalWithBreed->animalable->name }} {{$animalWithBreed->animalable->surname}} </a>
                                                @endif

                                            </div>
                                        </div>
                                        <img class="card-img-top"
                                             src="{{ $animalWithBreed->photos->first()->path ?? $placeholder}}"
                                             alt="{{ $animalWithBreed->name }}" title="{{ $animalWithBreed->name }}">
                                        <a href="{{ route('animal',['id'=>$animalWithBreed->id])}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>

                                        <div class="card-body">
                                            <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                            <!-- Title -->
                                            <h4 class="card-title mb-2">{{ $animalWithBreed->name }}
                                                @if ($animalWithBreed->animalDictionarySpecies->animal_dictionary->gender->id == 1)
                                                    <i class="ml-3 fas fa-lg fa-mars color-male"></i>
                                                @else
                                                    <i class="ml-3 fas fa-lg fa-venus color-female"></i>
                                                @endif
                                            </h4>

                                            <div class="d-flex flex-wrap mb-3">
                                                {!! '<p class="card-text w-50 mb-1">Wiek: <span class="font-weight-bold color-mid-grey ">'. $animalWithBreed->age .' lat/a</span></p>' ?? ''!!}
                                                {!! '<p class="card-text w-50 mb-1">Wielkość: <span class="font-weight-bold color-mid-grey ">'. $animalWithBreed->animalSize->name .'</span></p>' ?? ''!!}
                                            </div>

                                            <p class="card-text">{{ str_limit($animalWithBreed->description, 77) }}</p>

                                            <!-- Button -->
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('animal',['id'=>$animalWithBreed->id])}}"
                                                   class="m-0 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
                                                <a href="{{ route('animal',['id'=>$animalWithBreed->id])}}"
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
            @endif
        </div>
    </div>

{{--MODALS--}}

<!-- Modal Report-->
    <div class="modal fade" id="report_violation_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <input type="radio" class="form-check-input" id="report_violation_spam"
                               name="report_violation">
                        <label class="form-check-label" for="report_violation_spam">spam</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="report_violation_wrong_category"
                               name="report_violation">
                        <label class="form-check-label" for="report_violation_wrong_category">Niewłaściwa
                            kategoria</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="report_violation_outdated"
                               name="report_violation">
                        <label class="form-check-label" for="report_violation_outdated">Ogłoszenie
                            nieaktualne</label>
                    </div>
                    <div class="md-form mt-1 ml-4 mr-4">
                            <textarea id="report_violation_text" name="report_violation_text"
                                      class="md-textarea form-control" rows="2"
                                      placeholder="To ogłoszenie narusza zasady ponieważ"></textarea>
                        {{--                            <label for="report_violation_text">W polu poniżej opisz gdzie naruszane są nasze zasady</label>--}}
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <button
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


