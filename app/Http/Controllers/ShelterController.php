<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hipuppy\Interfaces\ShelterRepositoryInterface;
use App\Hipuppy\Gateways\ShelterGateway;
use App\Events\OrderPlacedEvent;

class ShelterController extends Controller
{
    public function __construct(ShelterRepositoryInterface $shelterRepository, ShelterGateway $shelterGateway)
    {
        $this->sR = $shelterRepository;
        $this->sG = $shelterGateway;
    }

    public function shelter($id){

        $result = $this->sR->getShelter($id);

        return view('frontend.shelter',['shelter'=>$result['shelter'], 'animalsForAdoption' => $result['animalsForAdoption'], 'animalsAdopted' => $result['animalsAdopted']]);

    }
}
