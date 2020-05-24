<?php


namespace App\Hipuppy\Interfaces;


interface FrontendRepositoryInterface
{

//    POBIERAM ZWIERZETA NA STRONE GŁÓWNA
    public function getAnimalForMainPage($paginate);

//    POBIERAM SCHRONISKA NA STRONE GŁÓWNA
    public function getSheltersForMainPage($paginate);

//    POBIERAM LICZBĘ SCHRONISK, ZWIERZĄT
    public function getCounter();


}

