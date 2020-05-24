<?php

namespace App\Hipuppy\Repositories;

use App\{Animal, Hipuppy\Interfaces\AnimalRepositoryInterface};

class AnimalRepository implements AnimalRepositoryInterface
{

    public function getAnimal(int $id)
    {

        $result = [];

        $animal = Animal::with([
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
            'animalCharacteristic',
            'animalCharacteristic.characteristicDictionary'
        ])
            ->find($id);
        $otherAnimals = $this->getOtherAnimals($animal->animalable_type, 4);

        $result = ['animal' => $animal, 'otherAnimals' => $otherAnimals];

        return $result;
    }

    public function getOtherAnimals(string $animalable_type, int $quantity)
    {

        $otherAnimals = Animal::with([
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
            ->where('animalable_type', $animalable_type)
            ->where('animal_status_id', 1)
            ->inRandomOrder()
            ->limit($quantity)
            ->get();

        return $otherAnimals;
    }

}
