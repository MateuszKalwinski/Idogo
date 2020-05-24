<?php

namespace App\Hipuppy\Interfaces;


interface AnimalsRepositoryInterface
{
//    POBIERAM WSZYSTKIE ZWIERZAKI
    public function getAnimalsForAdoption(int $paginate);

//    POBIERAM ZWIERZAKI DLA WYBRANEGO GATUNKU
    public function getAnimalsForAdoptionBySpecies(int $id, int $paginate);

//    POEBIRAM TUTAJ DANE POTRZEBNE DO WYSZUKIWARKI
    public function getDataForAnimalSearch();

//    WYSZUKUJE ZWIERZAKI WEDŁUG PODANYCH DANYCH
    public function searchAnimals($request, $animal);
}
