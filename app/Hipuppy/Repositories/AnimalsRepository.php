<?php

namespace App\Hipuppy\Repositories;


use App\{AgeDictionary,
    Animal,
    AnimalBreed,
    AnimalColor,
    AnimalSize,
    AnimalSpecies,
    CharacteristicDictionary,
    Fur,
    Gender,
    Hipuppy\Interfaces\AnimalsRepositoryInterface};


class AnimalsRepository implements AnimalsRepositoryInterface
{

    public function getAnimalsForAdoption(int $paginate)
    {
        $animals = Animal::with([
            'animalDictionarySpecies',
            'animalDictionarySpecies.animal_dictionary.gender',
            'animalDictionarySpecies.animal_dictionary',
            'animalDictionarySpecies.animal_dictionary.species',
            'photos',
            'animalColor',
            'animalSize',
            'animalBreed',
            'animalFur',
            'animalable',
            'animalable.user',
            'animalable.user.phones',
            'addressable',
            'addressable.city',
            'addressable.city.province',
            'animalStatus'
        ])
            ->where('animal_status_id', 1)
            ->paginate($paginate);

        return $animals;
    }

    public function getAnimalsForAdoptionBySpecies(int $id, int $paginate)
    {
        $animals = Animal::with([
            'animalDictionarySpecies',
            'animalDictionarySpecies.animal_dictionary.gender',
            'animalDictionarySpecies.animal_dictionary',
            'animalDictionarySpecies.animal_dictionary.species',
            'photos',
            'animalColor',
            'animalSize',
            'animalBreed',
            'animalFur',
            'animalable',
            'animalable.user',
            'animalable.user.phones',
            'addressable',
            'addressable.city',
            'addressable.city.province',
            'animalStatus'
        ])
            ->where('animal_status_id', 1)
            ->where('species_id', $id)
            ->paginate($paginate);

        return $animals;
    }

    public function getDataForAnimalSearch()
    {
        $result = [];

        $species = AnimalSpecies::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();

        $genders = Gender::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();

        $sizes = AnimalSize::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();

        $colors = AnimalColor::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();

        $fur = Fur::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();

        $breeds = AnimalBreed::select('id', 'species_id', 'name')
            ->orderBy('id', 'asc')
            ->get();

        $age = AgeDictionary::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();
        $characterDictionary = CharacteristicDictionary::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();


        $result = [
            'species' => $species,
            'breeds' => $breeds,
            'genders' => $genders,
            'sizes' => $sizes,
            'colors' => $colors,
            'fur' => $fur,
            'age' => $age,
            'characteristicDictionary' => $characterDictionary,
        ];

        return $result;

    }

    public function searchAnimals($request, $animal)
    {
        $animal = $animal->newQuery();

        $animal->with([
            'animalDictionarySpecies',
            'animalDictionarySpecies.animal_dictionary.gender',
            'animalDictionarySpecies.animal_dictionary',
            'animalDictionarySpecies.animal_dictionary.species',
            'photos',
            'animalColor',
            'animalSize',
            'animalBreed',
            'animalFur',
            'animalable',
            'animalable.user',
            'animalable.user.phones',
            'addressable',
            'addressable.city',
            'addressable.city.province',
            'animalStatus',
            'animalCharacteristic'

        ]);
        // SZUKAM ZWIERZĄT Z PODANYM GATUNKIEM
        if ($request->has('animalSpecies')) {
            if ($request->input('animalSpecies') !== null) {

                $animal->where('species_id', $request->input('animalSpecies'));
            }
        }

        // SZUKAM ZWIERZĄT Z PODANĄ RASĄ
        if ($request->has('animalBreeds')) {
            if ($request->input('animalBreeds') !== null) {
                $animal->where('breed_id', $request->input('animalBreeds'));
            }
        }

        // SZUKAM ZWIERZĄT O PODANEJ KATEGORI WIEKOWEJ

        if ($request->has('animalAge')) {
            if ($request->input('animalAge') !== null) {


//                $animal->where('size_id', $request->input('animalAge'));
            }
        }

        // SZUKAM ZWIERZĄT O PODANEJ WIELKOŚCI
        if ($request->has('animalSizes')) {
            if ($request->input('animalSizes') !== null) {
                $animal->where('size_id', $request->input('animalSizes'));
            }
        }

//        // SZUKAM ZWIERZĄT O PODANEJ PŁCI
        if ($request->has('animalGender')) {
            if ($request->input('animalGender') !== null) {
                $animal->whereHas('animalDictionarySpecies.animal_dictionary.gender', function ($query) use ($request) {
                    $query->where('gender_id', $request->input('animalGender'));
                });
            }
        }

        // SZUKAM ZWIERZĄT O PODANYM KOLORZE
        if ($request->has('animalColor')) {
            if ($request->input('animalColor') !== null) {
                $animal->where('color_id', $request->input('animalColor'));
            }
        }

        // SZUKAM ZWIERZĄT O PODANEJ DŁUGOŚCI FUTRA
        if ($request->has('animalFurs')) {
            if ($request->input('animalFurs') !== null) {
                $animal->where('fur_id', $request->input('animalFurs'));
            }
        }

        if ($request->has('option_1')) {
            if ($request->input('option_1') == 'on') {
                $animal->whereHas('animalCharacteristic', function ($query) use ($request) {
                    $query->where('characteristic_dictionary_id', 1);
                    $query->where('character_status', 1);
                });
            }
        }

        if ($request->has('option_2')) {
            if ($request->input('option_2') == 'on') {
                $animal->whereHas('animalCharacteristic', function ($query) use ($request) {
                    $query->where('characteristic_dictionary_id', 2);
                    $query->where('character_status', 1);
                });
            }
        }

        if ($request->has('option_3')) {
            if ($request->input('option_3') == 'on') {
                $animal->whereHas('animalCharacteristic', function ($query) use ($request) {
                    $query->where('characteristic_dictionary_id', 3);
                    $query->where('character_status', 1);
                });
            }
        }

        if ($request->has('option_4')) {
            if ($request->input('option_4') == 'on') {
                $animal->whereHas('animalCharacteristic', function ($query) use ($request) {
                    $query->where('characteristic_dictionary_id', 4);
                    $query->where('character_status', 1);
                });
            }
        }

        if ($request->has('option_5')) {
            if ($request->input('option_5') == 'on') {
                $animal->whereHas('animalCharacteristic', function ($query) use ($request) {
                    $query->where('characteristic_dictionary_id', 5);
                    $query->where('character_status', 1);
                });
            }
        }

        if ($request->has('option_6')) {
            if ($request->input('option_6') == 'on') {
                $animal->whereHas('animalCharacteristic', function ($query) use ($request) {
                    $query->where('characteristic_dictionary_id', 6);
                    $query->where('character_status', 1);
                });
            }
        }

        if ($request->has('option_7')) {
            if ($request->input('option_7') == 'on') {
                $animal->whereHas('animalCharacteristic', function ($query) use ($request) {
                    $query->where('characteristic_dictionary_id', 7);
                    $query->where('character_status', 1);
                });
            }
        }

        if ($request->has('option_8')) {
            if ($request->input('option_8') == 'on') {
                $animal->whereHas('animalCharacteristic', function ($query) use ($request) {
                    $query->where('characteristic_dictionary_id', 8);
                    $query->where('character_status', 1);
                });
            }
        }

        // SZUKAM ZWIERZĄT SZUKAJĄCYCH DOMU
        $animal->where('animal_status_id', 1);


        $animals = $animal->paginate(20)->appends([
            'animalSpecies' => $request->input('animalSpecies'),
            'animalSizes' => $request->input('animalSizes'),
        ]);


        return $animals;
    }

    public function breedDescription(int $id)
    {
        $breedDescription = AnimalBreed::with([
            'breedDescription',
            'species'
        ])
            ->find($id);

        return $breedDescription;
    }

    public function animalsWithBreed(int $id)
    {

        $animalsWithBreed = Animal::with([
            'animalDictionarySpecies',
            'animalDictionarySpecies.animal_dictionary.gender',
            'animalDictionarySpecies.animal_dictionary',
            'animalDictionarySpecies.animal_dictionary.species',
            'photos',
            'animalColor',
            'animalSize',
            'photos',
            'animalable',
            'animalable.user',
            'animalable.user.phones',
            'addressable',
            'addressable.city',
            'addressable.city.province',
        ])
            ->where('breed_id', $id)
            ->where('animal_status_id', 1)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return $animalsWithBreed;


    }

}
