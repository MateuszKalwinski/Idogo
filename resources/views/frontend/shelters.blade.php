@extends('layouts.menu')

@section('content')
<div id="ModuleName" data-moduleName="frontendShelters">
    <div class="container  mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h1 class="color-mid-grey my-auto">Znaleźliśmy <span
                        class="pink-text display-4">{{$shelters->total()}}</span> schronisk i organizacji</h1>
            </div>

            <div class="col-lg-9 col-md-9 ">

                <div class="row">
                    @foreach($shelters as $shelter)

                        <div class="col-lg-12 col-md-12 p-3">
                            <div class="card border-none ovf-hidden animal-ovf">

                                <!-- Card image -->
                                <div class="view overlay d-flex">
                                    <div class="w-40">
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
                                                    <i class="fas fa-lg fa-heart text-muted"></i>
                                                </button>
                                            @endif

                                        @else

                                            <a href="{{ route('login') }}"
                                               class="m-0 btn favourite-btn d-flex justify-content-center align-content-center btn-rounded text-white pl-3 pr-3 waves-effect waves-light text-transform-none">
                                                <i class="fas fa-heart mt-1 fa-lg text-muted"></i>
                                            </a>

                                        @endauth
{{--                                        <div class="w-40 pt-2 pl-2 pr-5 pb-2 d-flex bg-black-50 shelter-info">--}}
{{--                                            <div class="card-shelter-photo"--}}
{{--                                                 style="background-image: url({{ $animal->photos->first()->path ?? $placeholderShelter}});"></div>--}}
{{--                                            <div class="ml-3 d-flex align-items-center">--}}

{{--                                                @if($animal->animalable_type == 'App\Shelter')--}}
{{--                                                    <a href="{{ route('shelter',['id'=>$animal->animalable_id])}}"--}}
{{--                                                       class="text-white">{{$animal->animalable->name }} </a>--}}
{{--                                                @elseif($animal->animalable_type == 'App\User')--}}
{{--                                                    <a href="{{ route('user',['id'=>$animal->animalable_id])}}"--}}
{{--                                                       class="text-white">{{$animal->animalable->name }} {{$animal->animalable->surname}} </a>--}}
{{--                                                @endif--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <img class="card-img-top"
                                             src="{{ $shelter->photos->first()->path ?? $placeholderShelter}}"
                                             alt="{{ $shelter->name }}" title="{{ $shelter->name }}">
                                        <a href="{{ route('shelter',['id'=>$shelter->id])}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <div class="w-60">

                                        <div class="card-body">
                                            <a class="activator d-none"><i class="fas fa-share-alt"></i></a>
                                            <!-- Title -->
                                            <h4 class="card-title mb-2">{{ $shelter->name }}</h4>

                                            @foreach($shelter->addressable as $address)
                                                <p class="card-text mb-1">{{$address ->street . ' '. $address ->number }} <span class="font-weight-bold"> {{$address->city->name}}</span> ({{$address->city->province->name}})</p>
                                            @endforeach
                                            <hr class="mt-0">
                                            <p class="card-text">{{ str_limit($shelter->description, 110) }}</p>


                                            <!-- Button -->
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('shelter',['id'=>$shelter->id])}}"
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
                        <form class="" style="color: #757575;" action="{{ route('searchShelters') }}" method="get">


                            <div class="md-form mb-4">
                                <input type="search" id="cityName" name="cityName" value="{{app('request')->input('cityName')}}" class="form-control mdb-autocomplete">
                                <button class="mdb-autocomplete-clear">
                                    <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
                                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                                        <path d="M0 0h24v24H0z" fill="none" />
                                    </svg>
                                </button>
                                <label for="cityName" class="active">Miasto</label>
                                <input type="hidden" id="cityId" name="cityId" value="{{app('request')->input('cityId')}}">
                            </div>

                            <div class="md-form mb-4">
                                <p class="card-text blue-text mb-0">+ km</p>
                                <select id="cityDistance" name="cityDistance" class="mdb-select md-form m-0"
                                        searchable="+ km">
                                    <option value="0" @if( app('request')->input('cityDistance')  == 0) selected="selected"  @endif >0 km</option>
                                    <option value="10" @if( app('request')->input('cityDistance')  == 10) selected="selected"  @endif >10 km</option>
                                    <option value="25" @if( app('request')->input('cityDistance')  == 25) selected="selected"  @endif >25 km</option>
                                    <option value="50" @if( app('request')->input('cityDistance')  == 50) selected="selected"  @endif >50 km</option>
                                    <option value="100"@if( app('request')->input('cityDistance')  == 100) selected="selected"  @endif >100 km</option>
                                </select>
                            </div>

                            <button id="searchAnimals"
                                    class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none w-100 m-0 mb-3">
                                Szukaj<i class=" ml-2 fas fa-lg text-white fa-search fa-flip-horizontal"></i></button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-lg-12">
                {{ $shelters->links() }}

            </div>


        </div>


    </div>
</div>
@endsection


