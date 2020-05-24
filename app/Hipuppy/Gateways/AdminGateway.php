<?php

namespace App\Hipuppy\Gateways;

use App\Hipuppy\Interfaces\AdminRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;


class AdminGateway
{
    use ValidatesRequests;


    public function __construct(AdminRepositoryInterface $aR)
    {
        $this->aR = $aR;
    }

    public function storeAnimalColor($request)
    {
        $validator = Validator::make($request->all(), [
            'colorName' => 'required|string|max:255',
        ],
            [
                'colorName.required' => 'Pole "kolor" jest wymagane.',
                'colorName.string' => 'Pole "kolor" musi być typu tekstowego.',
                'colorName.max' => 'Pole "kolor" nie może mieć więcej niż 255 znaków.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->storeAnimalColor($request);
    }

    public function updateAnimalColor($request)
    {
        $validator = Validator::make($request->all(), [
            'colorName' => 'required|string|max:255',
            'animalColorId' => 'required|integer',
        ],
            [
                'colorName.required' => 'Pole "kolor" jest wymagane.',
                'colorName.string' => 'Pole "kolor" musi być typu tekstowego.',
                'colorName.max' => 'Pole "kolor" nie może mieć więcej niż 255 znaków.',

                'animalColorId.required' => 'Ups!coś poszło nie tak.',
                'animalColorId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->updateAnimalColor($request);
    }

    public function deleteAnimalColor($request)
    {
        $validator = Validator::make($request->all(), [
            'animalColorId' => 'required|integer',
        ],
            [
                'animalColorId.required' => 'Ups!coś poszło nie tak.',
                'animalColorId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->deleteAnimalColor($request);
    }

    public function storeAnimalCharacteristic($request)
    {
        $validator = Validator::make($request->all(), [
            'characteristicName' => 'required|string|max:255',
        ],
            [
                'characteristicName.required' => 'Pole "cecha zwierzaka" jest wymagane.',
                'characteristicName.string' => 'Pole "cecha zwierzaka" musi być typu tekstowego.',
                'characteristicName.max' => 'Pole "cecha zwierzaka" nie może mieć więcej niż 255 znaków.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->storeAnimalCharacteristic($request);
    }

    public function updateAnimalCharacteristic($request)
    {
        $validator = Validator::make($request->all(), [
            'characteristicName' => 'required|string|max:255',
            'animalCharacteristicId' => 'required|integer',
        ],
            [
                'characteristicName.required' => 'Pole "cecha zwierzaka" jest wymagane.',
                'characteristicName.string' => 'Pole "cecha zwierzaka" musi być typu tekstowego.',
                'characteristicName.max' => 'Pole "cecha zwierzaka" nie może mieć więcej niż 255 znaków.',

                'animalCharacteristicId.required' => 'Ups!coś poszło nie tak.',
                'animalCharacteristicId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->updateAnimalCharacteristic($request);
    }

    public function deleteAnimalCharacteristic($request)
    {
        $validator = Validator::make($request->all(), [
            'animalCharacteristicId' => 'required|integer',
        ],
            [
                'animalCharacteristicId.required' => 'Ups!coś poszło nie tak.',
                'animalCharacteristicId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->deleteAnimalCharacteristic($request);
    }

    public function storeAnimalSpecies($request)
    {
        $validator = Validator::make($request->all(), [
            'speciesName' => 'required|string|max:255',
        ],
            [
                'speciesName.required' => __('Pole "gatunek" jest wymagane.'),
                'speciesName.string' => __('Pole "gatunek" musi być typu tekstowego.'),
                'speciesName.max' => __('Pole "gatunek" nie może mieć więcej niż 255 znaków.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->storeAnimalSpecies($request);
    }

    public function updateAnimalSpecies($request)
    {
        $validator = Validator::make($request->all(), [
            'speciesName' => 'required|string|max:255',
            'animalSpeciesId' => 'required|integer',
        ],
            [
                'speciesName.required' => __('Pole "gatunek" jest wymagane.'),
                'speciesName.string' => __('Pole "gatunek" musi być typu tekstowego.'),
                'speciesName.max' => __('Pole "gatunek" nie może mieć więcej niż 255 znaków.'),

                'animalSpeciesId.required' => __('Ups!coś poszło nie tak.'),
                'animalSpeciesId.integer' => __('Ups!coś poszło nie tak.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->updateAnimalSpecies($request);
    }

    public function deleteAnimalSpecies($request)
    {
        $validator = Validator::make($request->all(), [
            'animalSpeciesId' => 'required|integer',
        ],
            [
                'animalSpeciesId.required' => __('Ups!coś poszło nie tak.'),
                'animalSpeciesId.integer' => __('Ups!coś poszło nie tak.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->deleteAnimalSpecies($request);
    }
}
