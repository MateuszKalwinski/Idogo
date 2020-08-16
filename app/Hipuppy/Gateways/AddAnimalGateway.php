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

    public function getSpeciesForAddAnimal($request)
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

        return $this->aaR->getSpeciesForAddAnimal($request);
    }
}
