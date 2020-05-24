<?php

namespace App\Hipuppy\Interfaces;


interface AnimalRepositoryInterface
{

//    POBIERAM DANE ZWIERZAKA
    public function getAnimal(int $id);

//    POBIERAM DANE INNYCH ZWIERZĄT DANEGO URZYTKOWNIKA LUB SCHRONISKA;
    public function getOtherAnimals(string $animalable_type, int $quantity);
}
