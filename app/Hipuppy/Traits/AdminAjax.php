<?php

namespace App\Hipuppy\Traits;

use Illuminate\Http\Request;


trait AdminAjax
{
    public function getSpecies(Request $request)
    {
        $species = $this->aR->getSpecies($request);

        $speciesCollection = $species->map(function ($singleSpecies) {
            return collect($singleSpecies->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json($speciesCollection);
    }

    public function getBreeds(Request $request)
    {
        $breeds = $this->aR->getBreeds($request);

        $prepare_breeds = [];

        foreach ($breeds as $breed) {
            $value = [];
            $value['species_id'] = $breed['id'];
            $value['species_name'] = $breed['name'];
            $value['breeds'] = $breed['animal_breed'];
            array_push($prepare_breeds, $value);
        }

        return response()->json($prepare_breeds);
    }

    public function getColors()
    {
        $colors = $this->aR->getColors();

        $colorCollection = $colors->map(function ($color) {
            return collect($color->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json($colorCollection);
    }

    public function getFurs()
    {
        $furs = $this->aR->getFurs();

        $furCollection = $furs->map(function ($furs) {
            return collect($furs->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json($furCollection);
    }

    public function getCharacteristics()
    {
        $characteristics = $this->aR->getCharacteristics();

        $characteristicsCollection = $characteristics->map(function ($characteristic) {
            return collect($characteristic->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json($characteristicsCollection);
    }
}
