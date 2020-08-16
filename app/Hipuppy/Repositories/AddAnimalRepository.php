<?php

namespace App\Hipuppy\Repositories;

use App\Hipuppy\Interfaces\AddAnimalRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\{AnimalBreed,
    AnimalColor,
    AnimalSpecies,
    AvailableCharacteristicDictionary,
    AvailableFurs,
    CharacteristicDictionary,
    Fur,
    AnimalSize,
    AvailableColors,
    Gender
};

class AddAnimalRepository implements AddAnimalRepositoryInterface
{
    public function getSpeciesForAddAnimal($request)
    {
        if (isset($request->speciesId)) {
            $species = AnimalSpecies::whereNull('deleted_at')->where('species_id', '=', $request->speciesId)->get();
        } else {
            $species = AnimalSpecies::whereNull('deleted_at')->get();
        }

        $speciesCollection = $species->map(function ($singleSpecies) {
            return collect($singleSpecies->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json(['success' => $speciesCollection]);
    }

    public function getGendersForAddAnimal()
    {
        $genders = Gender::whereNull('deleted_at')->get();

        $genderCollection = $genders->map(function ($gender) {
            return collect($gender->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json(['success' => $genderCollection]);
    }

    public function getSizesForAddAnimal()
    {
        $sizes = AnimalSize::whereNull('deleted_at')->get();

        $sizeCollection = $sizes->map(function ($size) {
            return collect($size->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json(['success' => $sizeCollection]);
    }
}
