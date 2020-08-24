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
        } elseif ($request->type === 'characteristic') {
            return $this->aaR->getCharacteristicsForAddAnimal($request);
        } else {
            return response()->json(['errors' => [__('Ups!coś poszło nie tak.')]]);
        }
    }

    public function getDataBreedForAddAnimal($request)
    {
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

    public function addAnimalForm($request){

        $this->validate($request, [
            'animalName' => 'required|string|max:255',
            'speciesId' => 'required|integer',
            'breedId' => 'nullable|integer',
            'genderId' => 'required|integer',
            'animalAge' => 'required|integer',
            'sizeId' => 'required|integer',
            'animalFur' => 'nullable|integer',
            'animalColor' => 'nullable|integer',
            'animalCharacteristics" => "nullable|array',
            'animalCharacteristics.*" => "integer',
            'animalDescription' => 'required|string|max:5000',
            'cityName' => 'required|string|max:255',
            'cityId' => 'required|integer',
            'streetName' => 'nullable|string|max:255',
            'streetNumber' => 'nullable|string|max:255',
            'phones" => "required|array|min:1',
            'phones.*" => "required|integer',
        ],
            [
                'animalName.required' => 'Pole "imie zwierzaka" jest wymagane.',
                'animalName.string' => 'Pole "imie zwierzaka" musi być typu tekstowego.',
                'animalName.max' => 'Pole "imie zwierzaka" nie może mieć więcej niż 255 znaków.',

                'speciesId.required' => 'Pole "gatunek" jest wymagane.',
                'speciesId.integer' => 'Ups! Coś poszło nie tak.',

                'breedId.integer' => 'Ups! Coś poszło nie tak.',

                'genderId.required' => 'Pole "płeć" jest wymagane.',
                'genderId.integer' => 'Ups! Coś poszło nie tak.',

                'animalAge.required' => 'Pole "wiek" jest wymagane.',
                'animalAge.integer' => 'Pole "wiek" musi być liczbą.',

                'sizeId.required' => 'Pole "wielkość" jest wymagane.',
                'sizeId.integer' => 'Ups! Coś poszło nie tak.',

                'animalFur.integer' => 'Ups! Coś poszło nie tak.',

                'animalColor.integer' => 'Ups! Coś poszło nie tak.',

                'animalCharacteristics.array' => 'Ups!coś poszło nie tak.',
                'animalCharacteristics.*.integer' => 'Ups!coś poszło nie tak.',

                'animalDescription.required' => 'Pole "opis" jest wymagane.',
                'animalDescription.string' => 'Pole "opis" musi być typu tekstowego.',
                'animalDescription.max' => 'Pole "opis" nie może mieć więcej niż 5000 znaków.',

                'cityName.required' => 'Pole "miasto" jest wymagane.',
                'cityName.string' => 'Pole "miasto" musi być typu tekstowego.',
                'cityName.max' => 'Pole "miasto" nie może mieć więcej niż 255 znaków.',

                'cityId.required' => 'Ups!coś poszło nie tak.',
                'cityId.integer' => 'Ups!coś poszło nie tak.',

                'streetName.string' => 'Pole "ulica" musi być typu tekstowego.',
                'streetName.max' => 'Pole "ulica" nie może mieć więcej niż 255 znaków.',

                'streetNumber.string' => 'Pole "numer" musi być typu tekstowego.',
                'streetNumber.max' => 'Pole "numer" nie może mieć więcej niż 255 znaków.',

                'phones.required' => 'Ups! Pole "telefon" jest wymagane.',
                'phones.array' => 'Ups!coś poszło nie tak.',
                'phones.min' => 'Wybierz przynajmniej jeden numer telefonu.',

                'phones.*.required' => 'Ups!coś poszło nie tak.',
                'phones.*.integer' => 'Ups!coś poszło nie tak.',

            ]
        );

        if ($request->hasFile('images')) {
            $this->validate($request, [
                'userPicture' => "image|max:2000",
                'images" => "nullable|array',
                'images.*" => "image|max:4000',

            ],
                [
                    'images.array' => 'Ups!coś poszło nie tak.',
                    'images.*.image' => 'Pole "zdjęcia" musi być mieć rozszerzenie jpg, jpeg lub png.',
                    'images.*.max' => 'Maksymalny rozmiar zdjęcia to 4MB',
                ]);
        }

        $addAnimal = $this->aaR->createAnimal($request);

        return $addAnimal;
    }
}
