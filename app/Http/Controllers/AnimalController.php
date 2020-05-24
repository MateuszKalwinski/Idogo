<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hipuppy\Interfaces\AnimalRepositoryInterface;
use App\Hipuppy\Gateways\AnimalGateway;

class AnimalController extends Controller
{
    public function __construct(AnimalRepositoryInterface $animalRepository, AnimalGateway $animalGateway)
    {

        $this->aR = $animalRepository;
        $this->aG = $animalGateway;
    }

    public function animal($id){

        $result = $this->aR->getAnimal($id);

        return view('frontend.animal',['animal'=>$result['animal'], 'otherAnimals'=>$result['otherAnimals']]);

    }
}
