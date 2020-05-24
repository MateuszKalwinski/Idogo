<?php

namespace App\Http\Controllers;

use App\Shelter;
use Illuminate\Http\Request;
use App\Hipuppy\Interfaces\SheltersRepositoryInterface;
use App\Hipuppy\Gateways\SheltersGateway;
use App\Events\OrderPlacedEvent;

class SheltersController extends Controller
{
    public function __construct(SheltersRepositoryInterface $sheltersRepository, SheltersGateway $sheltersGateway)
    {
        $this->sR = $sheltersRepository;
        $this->sG = $sheltersGateway;
    }

    public function shelters(){

        $shelters = $this->sR->getShelters();

        return view('frontend.shelters',['shelters'=>$shelters]);

    }

    public function searchShelters(Request $request, Shelter $shelter)
    {

        if ($request->has('cityId')){
            if ($request->input('cityId') == null){
                return redirect()->route('shelters');
            }
        }

        $shelters = $this->sR->searchShelters($request, $shelter);

        return view('frontend.shelters', ['shelters' => $shelters]);

    }

}
