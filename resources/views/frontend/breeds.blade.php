@extends('layouts.menu')

@section('content')

<div id="ModuleName" data-moduleName="frontendBreeds">

    <div class="container  mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h1 class="color-mid-grey my-auto">Znaleźliśmy <span
                        class="pink-text display-4">{{$breedDescriptions->total()}}</span> opisanych ras</h1>
            </div>

            <div class="col-lg-9 col-md-9 ">

                <div class="row">

                    @if(count($breedDescriptions) == 0)
                        <div class="col-lg-12 col-md-12 p-3">
                            <div class="card border-none mb-3">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Usp! Nie znaleźliśmy rasy, której szukasz.</h4>
                                    <div class="mb-4">
{{--                                        <p class="card-text">Możemy poinformować Cię gdy tylko pojawi się zwierzak, którego szukasz.</p>--}}
{{--                                        <p class="card-text">Aby to zrobić wypełnij poniższy formularz.</p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach($breedDescriptions as $breedDescription)

                        <div class="col-lg-12 col-md-12 p-3">
                            <div class="card border-none ovf-hidden animal-ovf">

                                <!-- Card image -->
                                <div class="view overlay d-flex">
                                    <div class="w-40">
                                        <img class="card-img-top"
                                             src="{{ $breedDescription->breed->photos->first()->path ?? $placeholderBreed}}"
                                             alt="{{ $breedDescription->breed->name }}" title="{{ $breedDescription->breed->name }}">
                                        <a href="{{ route('breedDescription',['id'=>$breedDescription->id])}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="w-60">

                                        <div class="card-body">
                                            <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                            <!-- Title -->
                                            <h4 class="card-title mb-2">{{ $breedDescription->breed->name }}
                                                    <span class="ml-2 h6 card-text"> {{$breedDescription->breed->species->name}}</span>
                                            </h4>

                                            <div class="d-flex flex-wrap">
                                                <ul class="d-flex flex-row flex-wrap mb-0 p-0"
                                                    style=" list-style-type: none;">
                                                    {!!   $breedDescription->nature !== null ? '<li class="pr-4 p-1 card-text lead z-index-1000">
                                                            <span class="font-weight-bold color-mid-grey ml-1">
                                                                <a class="" href="'. route('breedDescription',['id'=>$breedDescription->id]).'#nature">Charakter</a>
                                                            </span>
                                                        </li>' : '' !!}

                                                    {!! $breedDescription->health !== null ? '<li class="pr-4 p-1 card-text lead z-index-1000">
                                                            <span class="font-weight-bold color-mid-grey ml-1">
                                                                <a class="" href="'. route('breedDescription',['id'=>$breedDescription->id]).'#health">Zdrowie</a>
                                                            </span>
                                                        </li>' : '' !!}


                                                    {!! $breedDescription->history !== null ? '<li class="pr-4 p-1 card-text lead z-index-1000">
                                                            <span class="font-weight-bold color-mid-grey ml-1">
                                                                <a class="" href="'. route('breedDescription',['id'=>$breedDescription->id]).'#history">Historia</a>
                                                            </span>
                                                        </li>' : '' !!}

                                                    {!!  $breedDescription->fact !== null ? '<li class="pr-4 p-1 card-text lead z-index-1000">
                                                            <span class="font-weight-bold color-mid-grey ml-1">
                                                                <a class="" href="'. route('breedDescription',['id'=>$breedDescription->id]).'#fact">Ciekawostki</a>
                                                            </span>
                                                        </li>' : '' !!}

                                                </ul>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="card-text">{!! str_limit($breedDescription->nature, 110)  !!}</div>


                                            <!-- Button -->
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('breedDescription',['id'=>$breedDescription->id])}}"
                                                   class="mt-0 mb-0 mr-2 ml-2 btn indigo lighten-1 btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">Pokaż</a>
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
                        <form class="" style="color: #757575;" action="{{ route('searchBreeds') }}" method="get">

                            @if(isset($species))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Gatunek</p>
                                    <select id="animalSpecies" name="animalSpecies" class="mdb-select md-form m-0"
                                            searchable="Gatunek">
                                        <option value="">Bez znaczenia</option>
                                        @foreach($species as $type)
                                            <option value="{{$type->id}}"
                                                    @if( app('request')->input('animalSpecies')  == $type->id) selected="selected" @endif>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif

                            @if(isset($breedNames))

                                <div class="md-form mb-4">
                                    <p class="card-text blue-text mb-0">Rasa</p>
                                    <select id="animalBreeds" name="animalBreeds" class="mdb-select md-form m-0"
                                            searchable="Rasa">
                                        <option value="" selected>Bez znaczenia</option>
                                        @foreach($breedNames as $breedName)
                                            <option value="{{$breedName->breed_id}}"
                                                    data-species-id="{{$breedName->species_id}}"
                                                    @if( app('request')->input('animalBreeds')  == $breedName->breed_id) selected="selected" @endif>{{$breedName->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            @endif

                            <button id="searchBreeds"
                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">
                                Szukaj<i class=" ml-2 fas fa-lg text-white fa-search fa-flip-horizontal"></i></button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-lg-12">
                {{ $breedDescriptions->links() }}

            </div>


        </div>


    </div>
</div>
@endsection


