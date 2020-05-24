<?php


namespace App\Hipuppy\Repositories;

use App\{AnimalBreedDescription,
    Hipuppy\Interfaces\BreedsRepositoryInterface};
use Illuminate\Support\Facades\DB;


class BreedsRepository implements BreedsRepositoryInterface
{

    public function getBreedDescriptions(int $paginate)
    {
        $breedDescriptions = AnimalBreedDescription::with([
            'breed',
            'breed.photos',
            'breed.species'
        ])
            ->paginate($paginate);

        return $breedDescriptions;
    }

    public function getBreedNames()
    {

        $breedNames = DB::table('animal_breed_descriptions')
            ->select(
                'breed_id',
                'animal_breeds.name',
                'animal_breeds.species_id'
            )
            ->leftJoin('animal_breeds', 'animal_breed_descriptions.breed_id', '=', 'animal_breeds.id')
            ->get();

        return $breedNames;

    }

    public function getSpecies()
    {

        $species = DB::table('animal_species')
            ->select(
                'id',
                'name'
            )
            ->orderBy('id', 'asc')
            ->get();

        return $species;
    }

    public function searchBreeds($request, $animalBreedDescription)
    {
        $animalBreedDescription = $animalBreedDescription->newQuery();

        $animalBreedDescription->with([
            'breed',
            'breed.photos',
            'breed.species'

        ]);

        if ($request->has('animalSpecies')) {
            if ($request->input('animalSpecies') !== null) {
                $animalBreedDescription->whereHas('breed', function ($query) use ($request) {
                    $query->where('species_id', $request->input('animalSpecies'));
                });
            }
        }

        // SZUKAM ZWIERZĄT Z PODANĄ RASĄ
        if ($request->has('animalBreeds')) {
            if ($request->input('animalBreeds') !== null) {
                $animalBreedDescription->where('breed_id', $request->input('animalBreeds'));
            }
        }

        $breedDescriptions = $animalBreedDescription->paginate(20)->appends([
            'animalSpecies' => $request->input('animalSpecies'),
            'animalBreeds' => $request->input('animalBreeds'),
        ]);

        return $breedDescriptions;
    }


}
