<?php

namespace App\Hipuppy\Gateways;


use App\Hipuppy\Interfaces\AddAnimalRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;


class AddAnimalGateway
{
    use ValidatesRequests;

    public function __construct(AddAnimalRepositoryInterface $aaR)
    {
        $this->aaR = $aaR;
    }

    public function getDataSpeciesForAddAnimal($request)
    {
        $validator = Validator::make($request->all(), [
            'speciesId' => 'nullable|integer',
        ],
            [
                'speciesId.integer' => __('Ups!coś poszło nie tak.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->type === 'species') {
            return $this->aaR->getSpeciesForAddAnimal($request);
        } elseif ($request->type === 'breeds') {
            return $this->aaR->getBreedsForAddAnimal($request);
        } else {
            return response()->json(['errors' => [__('Ups!coś poszło nie tak.')]]);
        }
    }

    public function getDataBreedForAddAnimal($request){
        $validator = Validator::make($request->all(), [
            'breedId' => 'required|integer',
        ],
            [
                'breedId.required' => __('Ups!coś poszło nie tak.'),
                'breedId.integer' => __('Ups!coś poszło nie tak.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return 'ok';
    }
}
