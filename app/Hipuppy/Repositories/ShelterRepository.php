<?php

namespace App\Hipuppy\Repositories;

use App\{Animal, Hipuppy\Interfaces\ShelterRepositoryInterface, Shelter};


class ShelterRepository implements ShelterRepositoryInterface
{

    public function getShelter(int $id)
    {


        $shelter = Shelter::with([
            'addressable',
            'addressable.city',
            'addressable.city.province',
            'photos',
            'user',
            'user.phones',
            'openHoursable'
        ])
            ->find($id);

        $animalsForAdoption = $this->getAnimalsForAdoption($id);
        $animalsAdopted = $this->getAnimalsAdopted($id);

        $result = ['shelter' => $shelter, 'animalsForAdoption' => $animalsForAdoption, 'animalsAdopted' => $animalsAdopted];

        return $result;
    }

    public function getAnimalsForAdoption(int $shelter_id)
    {
        $animalsForAdoption = Animal::with([
            'animalDictionarySpecies',
            'animalDictionarySpecies.animal_dictionary.gender',
            'animalDictionarySpecies.animal_dictionary',
            'animalDictionarySpecies.animal_dictionary.species',
            'photos',
            'animalColor',
            'animalSize',
            'photos',
        ])
            ->where('animalable_type', "App\Shelter")
            ->where('animalable_id', $shelter_id)
            ->where('animal_status_id', 1)
            ->get();

        return $animalsForAdoption;
    }

    public function getAnimalsAdopted(int $shelter_id)
    {
        $animalsAdopted = Animal::with([
            'animalDictionarySpecies',
            'animalDictionarySpecies.animal_dictionary.gender',
            'animalDictionarySpecies.animal_dictionary',
            'animalDictionarySpecies.animal_dictionary.species',
            'photos',
            'animalColor',
            'animalSize',
            'photos',
        ])
            ->where('animalable_type', "App\Shelter")
            ->where('animalable_id', $shelter_id)
            ->where('animal_status_id', 2)
            ->get();

        return $animalsAdopted;
    }

}
