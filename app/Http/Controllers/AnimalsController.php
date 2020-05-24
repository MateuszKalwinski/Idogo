<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalBreed;
use Illuminate\Http\Request;
use App\Hipuppy\Interfaces\AnimalsRepositoryInterface;
use App\Hipuppy\Gateways\AnimalsGateway;
use App\Events\OrderPlacedEvent;

class AnimalsController extends Controller
{
    public function __construct(AnimalsRepositoryInterface $animalsRepository, AnimalsGateway $animalsGateway )
    {

        $this->aR = $animalsRepository;
        $this->aG = $animalsGateway;
    }

    public function animals($id = null, int $paginate = 20)
    {

        if (!$id) {
            $animals = $this->aR->getAnimalsForAdoption($paginate);
        } else {
            $animals = $this->aR->getAnimalsForAdoptionBySpecies($id, $paginate);
        }

        $dataForAnimalSearch = $this->aR->getDataForAnimalSearch();


        return view('frontend.animals', ['animals' => $animals, 'searchData' => $dataForAnimalSearch]);

    }

    public function searchAnimals(Request $request, Animal $animal)
    {

        $animals = $this->aR->searchAnimals($request, $animal);

        $dataForAnimalSearch = $this->aR->getDataForAnimalSearch();

        return view('frontend.animals', ['animals' => $animals, 'searchData' => $dataForAnimalSearch]);

    }

    public function breedDescription(int $id){

        $breedDescription = $this->aR->breedDescription($id);
        $animalsWithBreed = $this->aR->animalsWithBreed($id);

        return view('frontend.breedDescription', ['breedDescription' => $breedDescription, 'animalsWithBreed' => $animalsWithBreed]);

    }
}
