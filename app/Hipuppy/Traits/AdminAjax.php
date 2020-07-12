<?php

namespace App\Hipuppy\Traits;

use Illuminate\Http\Request;


trait BreedAjax
{
    public function getBreeds(Request $request){
        $breeds = $this->aR->getBreeds($request);

        $prepare_breeds = [];

        foreach ($breeds as $breed){
            $value = [];
            $value['species_id'] = $breed['id'];
            $value['species_name'] = $breed['name'];
            $value['breeds'] = $breed['animal_breed'];
            array_push($prepare_breeds, $value);
        }

        return response()->json($prepare_breeds);
    }
}
