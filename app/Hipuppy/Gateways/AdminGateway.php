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

    public function restoreAnimalColor($request)
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

        return $this->aR->restoreAnimalColor($request);
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

    public function restoreAnimalCharacteristic($request)
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

        return $this->aR->restoreAnimalCharacteristic($request);
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

    public function restoreAnimalSpecies($request)
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

        return $this->aR->restoreAnimalSpecies($request);
    }

    public function storeAnimalBreed($request)
    {
        $validator = Validator::make($request->all(), [
            'breedName' => 'required|string|max:255',
            'speciesId' => 'required|integer'
        ],
            [
                'breedName.required' => __('Pole "rasa" jest wymagane.'),
                'breedName.string' => __('Pole "rasa" musi być typu tekstowego.'),
                'breedName.max' => __('Pole "rasa" nie może mieć więcej niż 255 znaków.'),

                'speciesId.required' => __('Pole "gatunek" jest wymagane.'),
                'speciesId.integer' => __('Ups!coś poszło nie tak.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->storeAnimalBreed($request);
    }

    public function updateAnimalBreed($request)
    {
        $validator = Validator::make($request->all(), [
            'animalBreedId' => 'required|integer',
            'breedName' => 'required|string|max:255',
            'speciesId' => 'required|integer'
        ],
            [
                'animalBreedId.required' => __('Ups!coś poszło nie tak.'),
                'animalBreedId.integer' => __('Ups!coś poszło nie tak.'),

                'breedName.required' => __('Pole "rasa" jest wymagane.'),
                'breedName.string' => __('Pole "rasa" musi być typu tekstowego.'),
                'breedName.max' => __('Pole "rasa" nie może mieć więcej niż 255 znaków.'),

                'speciesId.required' => __('Pole "gatunek" jest wymagane.'),
                'speciesId.integer' => __('Ups!coś poszło nie tak.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->updateAnimalBreed($request);
    }

    public function deleteRestoreAnimalBreed($request)
    {
        $validator = Validator::make($request->all(), [
            'animalBreedId' => 'required|integer',
            'action' => 'required|string',
        ],
            [
                'animalBreedId.required' => 'Ups!coś poszło nie tak.',
                'animalBreedId.integer' => 'Ups!coś poszło nie tak.',

                'action.required' => 'Ups!coś poszło nie tak.',
                'action.string' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->action === 'delete') {
            $executeActionResult = $this->aR->deleteAnimalBreed($request);
        } elseif ($request->action === 'restore') {
            $executeActionResult = $this->aR->restoreAnimalBreed($request);
        } else {
            return response()->json(['errors' => [__('Ups!coś poszło nie tak.')]]);
        }

        return $executeActionResult;
    }

    public function storeAnimalFur($request)
    {
        $validator = Validator::make($request->all(), [
            'furName' => 'required|string|max:255',
        ],
            [
                'furName.required' => __('Pole "długość futra" jest wymagane.'),
                'furName.string' => __('Pole "długość futra" musi być typu tekstowego.'),
                'furName.max' => __('Pole "długość futra" nie może mieć więcej niż 255 znaków.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->storeAnimalFur($request);
    }

    public function updateAnimalFur($request)
    {
        $validator = Validator::make($request->all(), [
            'furName' => 'required|string|max:255',
            'animalFurId' => 'required|integer',
        ],
            [
                'furName.required' => __('Pole "długość futra" jest wymagane.'),
                'furName.string' => __('Pole "długość futra" musi być typu tekstowego.'),
                'furName.max' => __('Pole "długość futra" nie może mieć więcej niż 255 znaków.'),

                'animalFurId.required' => __('Ups!coś poszło nie tak.'),
                'animalFurId.integer' => __('Ups!coś poszło nie tak.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->updateAnimalFur($request);
    }

    public function deleteRestoreAnimalFur($request)
    {
        $validator = Validator::make($request->all(), [
            'animalFurId' => 'required|integer',
        ],
            [
                'animalFurId.required' => 'Ups!coś poszło nie tak.',
                'animalFurId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->action === 'delete') {
            $executeActionResult = $this->aR->deleteAnimalFur($request);
        } elseif ($request->action === 'restore') {
            $executeActionResult = $this->aR->restoreAnimalFur($request);
        } else {
            return response()->json(['errors' => [__('Ups!coś poszło nie tak.')]]);
        }

        return $executeActionResult;
    }

    public function storeAnimalSize($request)
    {
        $validator = Validator::make($request->all(), [
            'sizeName' => 'required|string|max:255',
        ],
            [
                'sizeName.required' => __('Pole "wielkość zwierzaka" jest wymagane.'),
                'sizeName.string' => __('Pole "wielkość zwierzaka" musi być typu tekstowego.'),
                'sizeName.max' => __('Pole "wielkość zwierzaka" nie może mieć więcej niż 255 znaków.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->storeAnimalSize($request);
    }

    public function updateAnimalSize($request)
    {
        $validator = Validator::make($request->all(), [
            'sizeName' => 'required|string|max:255',
            'animalSizeId' => 'required|integer',
        ],
            [
                'sizeName.required' => __('Pole "wielkość zwierzaka" jest wymagane.'),
                'sizeName.string' => __('Pole "wielkość zwierzaka" musi być typu tekstowego.'),
                'sizeName.max' => __('Pole "wielkość zwierzaka" nie może mieć więcej niż 255 znaków.'),

                'animalSizeId.required' => __('Ups!coś poszło nie tak.'),
                'animalSizeId.integer' => __('Ups!coś poszło nie tak.'),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->updateAnimalSize($request);
    }

    public function deleteAnimalSize($request)
    {

        $validator = Validator::make($request->all(), [
            'animalSizeId' => 'required|integer',
        ],
            [
                'animalSizeId.required' => 'Ups!coś poszło nie tak.',
                'animalSizeId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->deleteAnimalSize($request);
    }

    public function restoreAnimalSize($request)
    {
        $validator = Validator::make($request->all(), [
            'animalSizeId' => 'required|integer',
        ],
            [
                'animalSizeId.required' => 'Ups!coś poszło nie tak.',
                'animalSizeId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->restoreAnimalSize($request);
    }

    public function deleteAvailableColor($request)
    {
        $validator = Validator::make($request->all(), [
            'availableColorId' => 'required|integer',
        ],
            [
                'availableColorId.required' => 'Ups!coś poszło nie tak.',
                'availableColorId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->deleteAvailableColor($request);
    }

    public function storeUpdateAvailableColor($request)
    {
        $validator = Validator::make($request->all(), [
            "breedId" => "required|integer",
            "action" => "required|string",

            "colors" => "required|array|min:1",
            "colors.*" => "required|integer",
        ],
            [
                'breedId.required' => 'Ups!coś poszło nie tak.',
                'breedId.integer' => 'Ups!coś poszło nie tak.',

                'action.required' => 'Ups!coś poszło nie tak.',
                'action.string' => 'Ups!coś poszło nie tak.',

                'colors.required' => 'Ups! Pole "kolor" jest wymagane.',
                'colors.array' => 'Ups!coś poszło nie tak.',
                'colors.min' => 'Wybierz przynajmniej jeden kolor.',

                'colors.*.required' => 'Ups!coś poszło nie tak.',
                'colors.*.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->action === 'add') {
            return $this->aR->storeAvailableColor($request);
        } elseif ($request->action === 'edit') {
            return $this->aR->updateAvailableColor($request);
        } else {
            return response()->json(['errors' => 'Nieprawidłowa operacja.']);
        }
    }

    public function deleteAvailableFur($request)
    {
        $validator = Validator::make($request->all(), [
            'availableFurId' => 'required|integer',
        ],
            [
                'availableFurId.required' => 'Ups!coś poszło nie tak.',
                'availableFurId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->deleteAvailableFur($request);
    }

    public function storeUpdateAvailableFur($request)
    {
        $validator = Validator::make($request->all(), [
            "breedId" => "required|integer",
            "action" => "required|string",

            "furs" => "required|array|min:1",
            "furs.*" => "required|integer",
        ],
            [
                'breedId.required' => 'Ups!coś poszło nie tak.',
                'breedId.integer' => 'Ups!coś poszło nie tak.',

                'action.required' => 'Ups!coś poszło nie tak.',
                'action.string' => 'Ups!coś poszło nie tak.',

                'furs.required' => 'Ups! Pole "futro" jest wymagane.',
                'furs.array' => 'Ups!coś poszło nie tak.',
                'furs.min' => 'Wybierz przynajmniej jedną głogość futra.',

                'furs.*.required' => 'Ups!coś poszło nie tak.',
                'furs.*.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->action === 'add') {
            return $this->aR->storeAvailableFur($request);
        } elseif ($request->action === 'edit') {
            return $this->aR->updateAvailableFur($request);
        } else {
            return response()->json(['errors' => 'Nieprawidłowa operacja.']);
        }
    }

    public function deleteAvailableCharacteristic($request)
    {
        $validator = Validator::make($request->all(), [
            'availableCharacteristicId' => 'required|integer',
        ],
            [
                'availableCharacteristicId.required' => 'Ups!coś poszło nie tak.',
                'availableCharacteristicId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->deleteAvailableCharacteristic($request);
    }

    public function storeUpdateAvailableCharacteristic($request)
    {
        $validator = Validator::make($request->all(), [
            "speciesId" => "required|integer",
            "action" => "required|string",

            "characteristics" => "required|array|min:1",
            "characteristics.*" => "required|integer",
        ],
            [
                'speciesId.required' => 'Ups!coś poszło nie tak.',
                'speciesId.integer' => 'Ups!coś poszło nie tak.',

                'action.required' => 'Ups!coś poszło nie tak.',
                'action.string' => 'Ups!coś poszło nie tak.',

                'characteristics.required' => 'Ups! Pole "futro" jest wymagane.',
                'characteristics.array' => 'Ups!coś poszło nie tak.',
                'characteristics.min' => 'Wybierz przynajmniej jedną głogość futra.',

                'characteristics.*.required' => 'Ups!coś poszło nie tak.',
                'characteristics.*.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->action === 'add') {
            return $this->aR->storeAvailableCharacteristic($request);
        } elseif ($request->action === 'edit') {
            return $this->aR->updateAvailableCharacteristic($request);
        } else {
            return response()->json(['errors' => 'Nieprawidłowa operacja.']);
        }
    }

    public function getAvailableDataForBreed($request)
    {
        $validator = Validator::make($request->all(), [
            'animalBreedId' => 'required|integer',
        ],
            [
                'animalBreedId.required' => 'Ups!coś poszło nie tak.',
                'animalBreedId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->type === 'colors') {
            return $this->aR->getAvailableColorsForBreed($request);
        } elseif ($request->type === 'furs') {
            return $this->aR->getAvailableFursForBreed($request);
        } else {
            return response()->json(['errors' => 'Nieprawidłowa operacja.']);
        }
    }

    public function getAvailableDataForSpecies($request)
    {
        $validator = Validator::make($request->all(), [
            'animalSpeciesId' => 'required|integer',
        ],
            [
                'animalSpeciesId.required' => 'Ups!coś poszło nie tak.',
                'animalSpeciesId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->type === 'characteristics') {
            return $this->aR->getAvailableCharacteristicsForSpecies($request);
        } else {
            return response()->json(['errors' => 'Nieprawidłowa operacja.']);
        }
    }

    public function getShelterApplicationStatuses($request)
    {
        $validator = Validator::make($request->all(), [
            'applicationShelterId' => 'required|integer',
        ],
            [
                'applicationShelterId.required' => 'Ups!coś poszło nie tak.',
                'applicationShelterId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->aR->getShelterApplicationStatuses($request);
    }
}
