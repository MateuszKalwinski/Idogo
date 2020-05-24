<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hipuppy\Interfaces\BreedsRepositoryInterface;
use App\Hipuppy\Gateways\BreedsGateway;
use App\AnimalBreedDescription;

class BreedsController extends Controller
{
    public function __construct(BreedsRepositoryInterface $breedsRepository, BreedsGateway $breedsGateway)
    {

        $this->bR = $breedsRepository;
        $this->bG = $breedsGateway;
    }

    public function breeds(int $paginate = 20)
    {
        $breedDescriptions = $this->bR->getBreedDescriptions($paginate);

        $breedNames = $this->bR->getBreedNames();

        $species = $this->bR->getSpecies();

        return view('frontend.breeds', ['breedDescriptions' => $breedDescriptions , 'breedNames' => $breedNames, 'species' => $species]);

    }

    public function searchBreeds(Request $request, AnimalBreedDescription $animalBreedDescription)
    {

        $breedDescriptions = $this->bR->searchBreeds($request, $animalBreedDescription);

        $breedNames = $this->bR->getBreedNames();

        $species = $this->bR->getSpecies();

        return view('frontend.breeds', ['breedDescriptions' => $breedDescriptions , 'breedNames' => $breedNames, 'species' => $species]);

    }

}
