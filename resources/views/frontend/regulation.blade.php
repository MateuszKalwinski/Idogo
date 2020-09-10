
@extends('layouts.indexFronend')

@section('content')
    <div id="ModuleName" data-moduleName="frontendIndex">
        <div class="container mt-5 mb-5">
            <div class="row mb-5">
                <div class="col-lg-12 col-md-12 mb-4 p-0">
                    <h2 class="text-title m-0">Regulamin</h2>
                </div>

                <div class="col-lg-12 col-md-12 mb-4 p-0">
                    @isset($regulation[0])
                        {!! $regulation[0]->content !!}

                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-black-50 mr-2">Data dodania regulaminu: {{$regulation[0]->created_at}}</p>

                                @if(!empty($regulation[0]->updated_at))
                                    <p class="text-black-50 mr-2">Data dodania regulaminu: {{$regulation[0]->updated_at}}</p>
                                @endif
                            </div>
                            <div>
                                <p class="text-black-50 mr-2">Wersja regulaminu: {{$regulation[0]->version}}</p>
                            </div>
                        </div>

                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection

