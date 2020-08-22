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
use Illuminate\Support\Facades\DB;

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

    public function getBreedsForAddAnimal($request)
    {
        $breedCollection = DB::table('animal_breeds AS ab')
            ->select(
                'ab.id as id',
                'ab.name as name'
            )
            ->where('ab.species_id', '=', $request->speciesId)->whereNull('ab.deleted_at')->get();

        return response()->json(['success' => $breedCollection]);
    }

    public function getCharacteristicsForAddAnimal($request)
    {
        $characteristics = DB::table('available_characteristic_dictionary AS achd')
            ->select(
                'chd.id as id',
                'chd.name as name'
            )
            ->leftJoin('characteristic_dictionary AS chd', 'achd.characteristic_dictionary_id', '=', 'chd.id')
            ->where('achd.species_id', '=', $request->speciesId)->whereNull('chd.deleted_at')->get();

        return response()->json(['success' => $characteristics]);
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

    public function getColorsForAddAnimal($request)
    {
        $availableColors = DB::table('available_colors AS ac')
            ->select(
                'acol.id as color_id',
                'acol.name as color_name'
            )
            ->leftJoin('animal_colors AS acol', 'ac.color_id', '=', 'acol.id')
            ->where('ac.breed_id', '=', $request->breedId)->whereNull('acol.deleted_at')->get();

        return response()->json(['success' => $availableColors]);
    }

    public function getFursForAddAnimal($request)
    {
        $availableFurs = DB::table('available_furs AS af')
            ->select(
                'f.id as fur_id',
                'f.name as fur_name'
            )
            ->leftJoin('fur AS f', 'af.fur_id', '=', 'f.id')
            ->where('af.breed_id', '=', $request->breedId)->whereNull('f.deleted_at')->get();

        return response()->json(['success' => $availableFurs]);
    }

    public function createAnimal($request)
    {

        if ($request->has('breedId')) {
            dd('ok');
        } else {
            dd('okok');
        }

    }
}
