<?php

namespace App\Hipuppy\Repositories;

use App\{Hipuppy\Interfaces\AdminRepositoryInterface};
use App\{AnimalColor, AnimalSpecies, CharacteristicDictionary, Fur, AnimalSize};
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRepository implements AdminRepositoryInterface
{

    /*
     * TODO prawdopodobnie warto przy przy select i join stosować "AS" żeby oszczędzić sobie przepisywania nazw tabel
     * */
    public function adminUsers()
    {

        $datatable = datatables()->of($this->getUserForDatatable())
            ->addColumn('user_photo', function ($data) {

                $userPhoto = ($data->photo_path) ? '<img src="../storage/' . $data->photo_path . '" alt="' . $data->photo_path . '" class="img-thumbnail" style="width:70px;" />' : '<img src="' . '../images/placeholder-user.jpg' . '" alt="' . '../images/placeholder-user.jpg' . '" class="img-thumbnail" style="width:70px;" />';

                return $userPhoto;
            })
            ->addColumn('user_id', function ($data) {

                $animalId = '<span data-user-id="' . $data->user_id . '">' . $data->user_id . '</span>';
                return $animalId;
            })
            ->addColumn('user_full_name', function ($data) {

                $linkToUser = route('user', ['id' => $data->user_id]);
                $userName = '<a href="' . $linkToUser . '">' . $data->user_name . ' ' . $data->user_surname . '</a>';
                return $userName;

            })
            ->addColumn('user_email', function ($data) {

                $userEmail = '<span data-user-email="' . $data->user_email . '">' . $data->user_email . '</span>';
                return $userEmail;
            })
            ->addColumn('shelter_name', function ($data) {
                if ($data->shelter_id) {
                    $linkToShelter = route('shelter', ['id' => $data->shelter_id]);
                    $shelterName = '<a href="' . $linkToShelter . '">' . $data->shelter_name . '</a>';
                } else {
                    $shelterName = '<span>Brak</span>';
                }
                return $shelterName;
            })
            ->addColumn('count_animals', function ($data) {

                if ($data->shelter_id) {
                    $countAnimals = '<span data-count-animals="' . $data->count_shelter_animals . '">' . $data->count_shelter_animals . '</span>';
                } else {
                    $countAnimals = '<span data-count-animals="' . $data->count_user_animals . '">' . $data->count_user_animals . '</span>';
                }
                return $countAnimals;
            })
            ->addColumn('user_created_at', function ($data) {

                $userCreatedAt = '<span>' . $data->user_created_at . '</span>';
                return $userCreatedAt;
            })
            ->addColumn('user_role', function ($data) {
                if ($data->role_user_role_id) {
                    $userRoleName = '<span data-user-role-id="' . $data->role_user_role_id . '">' . $data->role_name . '</span>';
                } else {
                    $userRoleName = '<span>Brak</span>';
                }
                return $userRoleName;
            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-species waves-effect waves-light" data-species-id="' . $data->user_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-species waves-effect waves-light" data-species-id="' . $data->user_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>';
                return $actions;
            })
            ->rawColumns(['user_photo', 'user_id', 'user_full_name', 'user_email', 'shelter_name', 'count_animals', 'user_created_at', 'user_role', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getUserForDatatable()
    {

        $usersForDatatable = DB::table('users')
            ->select(
                'users.id AS user_id',
                'users.name AS user_name',
                'users.surname AS user_surname',
                'users.email AS user_email',
                'users.created_at AS user_created_at',
                'role_user.role_id AS role_user_role_id',
                'roles.name AS role_name',
                'photos.id AS photo_id',
                'photos.path AS photo_path',
                'shelters.id AS shelter_id',
                'shelters.name AS shelter_name',
                DB::raw("(SELECT COUNT(animals.id) FROM animals
                                WHERE animals.animalable_id = users.id AND animals.animalable_type LIKE '%User%') as count_user_animals"),
                DB::raw("(SELECT COUNT(animals.id) FROM animals
                                WHERE animals.animalable_id = shelters.id AND animals.animalable_type LIKE '%Shelter%') as count_shelter_animals")
            )
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
            ->leftJoin('shelters', 'users.id', '=', 'shelters.user_id')
            ->leftJoin('photos', function ($join) {
                $join->on('users.id', '=', 'photos.photoable_id')
                    ->where('photos.photoable_type', '=', 'App\User');
            })
            ->get();
        return $usersForDatatable;

    }

    public function adminShelterApplication()
    {

        $datatable = datatables()->of($this->gerShelterApplicationsForDatatable())
            ->addColumn('action', function ($data) {
                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-species waves-effect waves-light" data-shelter-application-id="' . $data->id . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-species waves-effect waves-light" data-shelter-application-id="' . $data->id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>';
                return $actions;
            })
            ->addColumn('user', function ($data) {
                if ($data->user_id) {
                    $linkToUser = route('user', ['id' => $data->user_id]);
                    $user = '<a href="' . $linkToUser . '">' . $data->user_name . ' ' . $data->user_surname . '</a>';
                } else {
                    $user = 'Brak powiązań';
                }
                return $user;
            })
            ->addColumn('nameAndSurname', function ($data) {


                $nameAndSurname = $data->name . ' ' . $data->surname;
                return $nameAndSurname;
            })
            ->addColumn('address', function ($data) {

                $address = '<a href="https://maps.google.com/?q=' . $data->street . ' ' . $data->city . ' ' . $data->zip_code . '">' . $data->street . ' ' . $data->city . ' ' . $data->zip_code . '</a>';
                return $address;
            })
            ->addColumn('shelterApplicationStatus', function ($data) {
                $shelterApplicationStatus = '<span data-shelter-application-stauts-id="' . $data->shelter_application_status_id . '">' . $data->shelter_application_status_name . '</span>';
                return $shelterApplicationStatus;
            })
            ->rawColumns(['nameAndSurname', 'action', 'address', 'shelterApplicationStatus', 'user'])
            ->make(true);


        return $datatable;
    }

    public function gerShelterApplicationsForDatatable()
    {


        $shelterApplicationsForDatatable = DB::table('shelter_application')
            ->select(
                'shelter_application.id',
                'shelter_application.name',
                'shelter_application.surname',
                'shelter_application.email',
                'shelter_application.phone',
                'shelter_application.shelter_name',
                'shelter_application.street',
                'shelter_application.city',
                'shelter_application.zip_code',
                'shelter_application.nip',
                'shelter_application.regon',
                'shelter_application.created_at',
                'shelter_application_statuses.name as shelter_application_status_name',
                'shelter_application_status_id',
                'users.id AS user_id',
                'users.name AS user_name',
                'users.surname AS user_surname'
            )
            ->leftJoin('users', 'shelter_application.email', '=', 'users.email')
            ->leftJoin('shelter_application_statuses', 'shelter_application.shelter_application_status_id', '=', 'shelter_application_statuses.id')
            ->get();
        return $shelterApplicationsForDatatable;
    }

    public function adminSpecies()
    {
        $datatable = datatables()->of($this->getSpeciesForDatatable())
            ->addColumn('animal_species_id', function ($data) {

                $animalSpeciesId = '<span data-animal-species-id="' . $data->species_id . '">' . $data->species_id . '</span>';
                return $animalSpeciesId;
            })
            ->addColumn('animal_species_name', function ($data) {

                $animalSpeciesName = '<span class="animal-species-name" data-animal-species-id="' . $data->species_id . '">' . $data->species_name . '</span>';
                return $animalSpeciesName;
            })
            ->addColumn('count_animals_with_species', function ($data) {

                $animalGenderName = '<span data-count-animals-with-species="' . $data->count_animals_with_species . '">' . $data->count_animals_with_species . '</span>';
                return $animalGenderName;
            })
            ->addColumn('species_created_at', function ($data) {

                $animalSpeciesCreatedAt = '<span>' . $data->species_created_at . '</span>';
                return $animalSpeciesCreatedAt;
            })
            ->addColumn('added_user', function ($data) {

                $linkToUser = route('user', ['id' => $data->created_user_id]);
                $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->created_user_name . ' ' . $data->created_user_surname . '</a>';
                return $nameAndSurname;
            })
            ->addColumn('species_edited_at', function ($data) {
                $animalSpeciesEditeddAt = ($data->edited_at) ? '<span>' . $data->edited_at . '</span>' : '<span>Brak</span>';
                return $animalSpeciesEditeddAt;
            })
            ->addColumn('edited_user', function ($data) {
                if ($data->edited_user_id) {
                    $linkToUser = route('user', ['id' => $data->edited_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->edited_user_name . ' ' . $data->edited_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;

            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-animal-species waves-effect waves-light" data-animal-species-id="' . $data->species_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-animal-species waves-effect waves-light" data-animal-species-id="' . $data->species_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>';
                return $actions;
            })
            ->rawColumns(['animal_species_id', 'animal_species_name', 'count_animals_with_species', 'species_created_at', 'added_user', 'species_edited_at', 'edited_user', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getSpeciesForDatatable()
    {

        $speciesForDatatable = DB::table('animal_species')
            ->select(
                'animal_species.id AS species_id',
                'animal_species.name AS species_name',
                'animal_species.created_at AS species_created_at',
                DB::raw("(SELECT COUNT(animals.id) FROM animals
                                WHERE animals.species_id = animal_species.id) as count_animals_with_species"),
                'animal_species.created_user_id',
                'animal_species.edited_at',
                'animal_species.edited_user_id',
                'created_user.name AS created_user_name',
                'created_user.surname AS created_user_surname',
                'edited_user.name AS edited_user_name',
                'edited_user.surname AS edited_user_surname'

            )
            ->leftJoin('users AS created_user', 'animal_species.created_user_id', '=', 'created_user.id')
            ->leftJoin('users AS edited_user', 'animal_species.edited_user_id', '=', 'edited_user.id')
            ->get();

        return $speciesForDatatable;
    }

    public function adminSpeciesWithGender()
    {
        $datatable = datatables()->of($this->getSpeciesWithGenderForDatatable())
            ->addColumn('animal_dictionary_id', function ($data) {

                $animalDictionaryId = '<span data-animal-dictionary-id="' . $data->animal_dictionary_id . '">' . $data->animal_dictionary_id . '</span>';
                return $animalDictionaryId;
            })
            ->addColumn('animal_dictionary_name', function ($data) {

                $animalDictionaryName = '<span data-animal-dictionary-id="' . $data->animal_dictionary_id . '">' . $data->animal_dictionary_name . '</span>';
                return $animalDictionaryName;
            })
            ->addColumn('animal_species_name', function ($data) {

                $animalSpeciesName = '<span data-animal-species-id="' . $data->animal_dictionary_species_id . '">' . $data->animal_species_name . '</span>';
                return $animalSpeciesName;
            })
            ->addColumn('animal_gender_name', function ($data) {

                $animalGenderName = '<span data-gender-id="' . $data->animal_dictionary_gender_id . '">' . $data->gender_name . '</span>';
                return $animalGenderName;
            })
            ->addColumn('animal_dictionary_created_at', function ($data) {

                $animalDictionaryCreatedAt = '<span>' . $data->animal_dictionary_created_at . '</span>';
                return $animalDictionaryCreatedAt;
            })
            ->addColumn('added_user', function ($data) {

                $linkToUser = route('user', ['id' => $data->animal_dictionary_created_user_id]);
                $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->user_name . ' ' . $data->user_surname . '</a>';
                return $nameAndSurname;
            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-species waves-effect waves-light" data-species-id="' . $data->animal_dictionary_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-species waves-effect waves-light" data-species-id="' . $data->animal_dictionary_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>';
                return $actions;
            })
            ->rawColumns(['animal_dictionary_id', 'animal_dictionary_name', 'animal_species_name', 'animal_gender_name', 'animal_dictionary_created_at', 'added_user', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getSpeciesWithGenderForDatatable()
    {
        $speciesWithGenderForDatatable = DB::table('animal_dictionary')
            ->select(
                'animal_dictionary.id AS animal_dictionary_id',
                'animal_dictionary.name AS animal_dictionary_name',
                'animal_dictionary.created_at AS animal_dictionary_created_at',
                'animal_dictionary.created_user_id AS animal_dictionary_created_user_id',
                'animal_dictionary.gender_id AS animal_dictionary_gender_id',
                'genders.name AS gender_name',
                'animal_dictionary.species_id AS animal_dictionary_species_id',
                'animal_species.name AS animal_species_name',
                'animal_dictionary.created_user_id',
                'users.name AS user_name',
                'users.surname AS user_surname'
            )
            ->leftJoin('users', 'animal_dictionary.created_user_id', '=', 'users.id')
            ->leftJoin('animal_species', 'animal_dictionary.species_id', '=', 'animal_species.id')
            ->leftJoin('genders', 'animal_dictionary.gender_id', '=', 'genders.id')
            ->orderBy('animal_dictionary.id', 'asc')
            ->get();

        return $speciesWithGenderForDatatable;
    }

    public function adminBreeds()
    {

        $datatable = datatables()->of($this->getBreedsForDatatable())
            ->addColumn('animal_breed_id', function ($data) {

                $animalBreedId = '<span data-animal-breed-id="' . $data->animal_breed_id . '">' . $data->animal_breed_id . '</span>';
                return $animalBreedId;
            })
            ->addColumn('animal_breed_name', function ($data) {

                $animalBreedName = '<span data-animal-breed-id="' . $data->animal_breed_id . '">' . $data->animal_breed_name . '</span>';
                return $animalBreedName;
            })
            ->addColumn('animal_species_name', function ($data) {

                $animalSpeciesName = '<span data-animal-species-id="' . $data->animal_breed_species_id . '">' . $data->animal_species_name . '</span>';
                return $animalSpeciesName;
            })
            ->addColumn('count_animals_with_breed', function ($data) {

                $animalGenderName = '<span data-count-animals-with-breed="' . $data->count_animals_with_breed . '">' . $data->count_animals_with_breed . '</span>';
                return $animalGenderName;
            })
            ->addColumn('breed_description', function ($data) {

                if ($data->animal_breed_description_breed_id) {
                    $linkToBreedDescription = route('breedDescription', ['id' => $data->animal_breed_description_breed_id]);
                    $breedDescription = '<span>Opis <a href="' . $linkToBreedDescription . '">' . $data->animal_breed_name . '</a></span>';
                } else {
                    $breedDescription = '<span>Brak</span>';
                }
                return $breedDescription;
            })
            ->addColumn('animal_breed_created_at', function ($data) {

                $animalDictionaryCreatedAt = '<span>' . $data->animal_breed_created_at . '</span>';
                return $animalDictionaryCreatedAt;
            })
            ->addColumn('added_user', function ($data) {

                $linkToUser = route('user', ['id' => $data->animal_breed_created_user_id]);
                $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->user_name . ' ' . $data->user_surname . '</a>';
                return $nameAndSurname;
            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-species waves-effect waves-light" data-species-id="' . $data->animal_breed_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-species waves-effect waves-light" data-species-id="' . $data->animal_breed_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>';
                return $actions;
            })
            ->rawColumns(['animal_breed_id', 'animal_breed_name', 'animal_species_name', 'count_animals_with_breed', 'breed_description', 'animal_breed_created_at', 'added_user', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getBreedsForDatatable()
    {
        $breedsForDatatable = DB::table('animal_breeds')
            ->select(
                'animal_breeds.id AS animal_breed_id',
                'animal_breeds.name AS animal_breed_name',
                'animal_breeds.species_id AS animal_breed_species_id',
                'animal_species.name AS animal_species_name',
                'animal_breeds.created_at AS animal_breed_created_at',
                'animal_breeds.created_user_id AS animal_breed_created_user_id',
                'users.name AS user_name',
                'users.surname AS user_surname',
                DB::raw("(SELECT COUNT(animals.id) FROM animals
                                WHERE animals.breed_id = animal_breeds.id) as count_animals_with_breed"),
                'animal_breed_descriptions.breed_id AS animal_breed_description_breed_id'


            )
            ->leftJoin('animal_breed_descriptions', 'animal_breeds.id', '=', 'animal_breed_descriptions.breed_id')
            ->leftJoin('users', 'animal_breeds.created_user_id', '=', 'users.id')
            ->leftJoin('animal_species', 'animal_breeds.species_id', '=', 'animal_species.id')
            ->orderBy('animal_breeds.id', 'asc')
            ->get();

        return $breedsForDatatable;
    }

    public function adminAnimals()
    {
        $datatable = datatables()->of($this->getAnimalsForDatatable())
            ->addColumn('animal_photos', function ($data) {

                $animalPhoto = ($data->photo_path) ? '<img src="' . $data->photo_path . '" alt="' . $data->photo_path . '" class="img-thumbnail" style="width:70px;" />' : '<img src="' . '../images/placeholder.jpg' . '" alt="' . '../images/placeholder.jpg' . '" class="img-thumbnail" style="width:70px;" />';

                return $animalPhoto;
            })
            ->addColumn('animal_id', function ($data) {

                $animalId = '<span data-animal-id="' . $data->animal_id . '">' . $data->animal_id . '</span>';
                return $animalId;
            })
            ->addColumn('animal_name', function ($data) {

                $linkToAnimal = route('animal', ['id' => $data->animal_id]);
                $animalName = '<a href="' . $linkToAnimal . '">' . $data->animal_name . '</a>';
                return $animalName;

            })
            ->addColumn('animal_species_name', function ($data) {

                $animalSpeciesName = '<span data-animal-species-id="' . $data->animal_species_id . '">' . $data->animal_species_name . '</span>';
                return $animalSpeciesName;
            })
            ->addColumn('animal_breed_name', function ($data) {
                if ($data->breed_description_id) {
                    $linkToBreedDescription = route('breedDescription', ['id' => $data->breed_description_id]);
                    $animalBreedName = '<a href="' . $linkToBreedDescription . '">' . $data->animal_breed_name . '</a>';
                    return $animalBreedName;
                } else {
                    $animalBreedName = '<span data-animal-breed-id="' . $data->animal_breed_id . '">' . $data->animal_breed_name . '</span>';
                    return $animalBreedName;
                }
            })
            ->addColumn('animal_gender_name', function ($data) {

                $animalGenderName = '<span data-animal-gender-id="' . $data->animal_dictionary_gender_id . '">' . $data->gender_name . '</span>';
                return $animalGenderName;
            })
            ->addColumn('animal_price', function ($data) {

                $animalPrice = '<span data-animal-price="' . $data->animal_price . '">' . money_format('%i', $data->animal_price) . ' zł</span>';
                return $animalPrice;
            })
            ->addColumn('animal_status_name', function ($data) {

                $animalStatusName = '<span data-animal-status-id="' . $data->animal_status_id . '">' . $data->animal_status_name . '</span>';
                return $animalStatusName;
            })
            ->addColumn('animal_created_at', function ($data) {

                $animalCreatedAt = '<span>' . $data->animal_created_at . '</span>';
                return $animalCreatedAt;
            })
            ->addColumn('added_user', function ($data) {

                if ($data->animal_animalable_type === 'App\Shelter') {
                    $linkToshelter = route('shelter', ['id' => $data->shelter_id]);
                    $shelterName = '<span>Schronisko </span><a href="' . $linkToshelter . '">' . $data->shelter_name . '</a>';
                    return $shelterName;
                } else {
                    $linkToUser = route('user', ['id' => $data->owner_user_id]);
                    $nameAndSurname = '<span>Użytkownik </span><a href="' . $linkToUser . '">' . $data->owner_user_name . ' ' . $data->owner_user_surname . '</a>';
                    return $nameAndSurname;
                }
            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-species waves-effect waves-light" data-species-id="' . $data->animal_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-species waves-effect waves-light" data-species-id="' . $data->animal_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>';
                return $actions;
            })
            ->rawColumns(['animal_photos', 'animal_id', 'animal_name', 'animal_species_name', 'animal_breed_name', 'animal_gender_name', 'animal_price', 'animal_status_name', 'animal_created_at', 'added_user', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getAnimalsForDatatable()
    {
        $animalsForDatatable = DB::table('animals')
            ->select(
                'animals.id AS animal_id',
                'animals.name AS animal_name',
                'animals.species_id AS animal_species_id',
                'animal_species.name AS animal_species_name',
                'animals.breed_id AS animal_breed_id',
                'animal_breeds.name AS animal_breed_name',
                'animals.breed_mix AS animal_breed_mix',
                'animal_dictionary_species.animal_id AS animal_dictionary_species_animal_id',
                'animal_dictionary_species.animal_dictionary_id AS animal_dictionary_species_dictionary',
                'animal_dictionary.name AS animal_dictionary_name',
                'animal_dictionary.id AS animal_dictionary_id',
                'animal_breed_descriptions.breed_id as breed_description_id',
                'animal_dictionary.gender_id AS animal_dictionary_gender_id',
                'genders.name AS gender_name',
                'animals.price AS animal_price',
                'animals.animal_status_id AS animal_status_id',
                'animal_status.name AS animal_status_name',
                'animals.created_at AS animal_created_at',
                'animals.animalable_type AS animal_animalable_type',
                'animals.animalable_id AS animal_animalable_id',
                'shelters.id AS shelter_id',
                'shelters.name AS shelter_name',
                'photos.id AS photo_id',
                'photos.path AS photo_path',
                'animals.created_user_id as animal_created_user_id',
                'users.name as created_user_name',
                'users.surname as created_user_surname',
                'owner_user.id AS owner_user_id',
                'owner_user.name AS owner_user_name',
                'owner_user.surname AS owner_user_surname'
            )
            ->leftJoin('users AS owner_user', 'animals.animalable_id', '=', 'owner_user.id')
            ->leftJoin('users', 'animals.created_user_id', '=', 'users.id')
            ->leftJoin('shelters', 'animals.animalable_id', '=', 'shelters.id')
            ->leftJoin('animal_species', 'animals.species_id', '=', 'animal_species.id')
            ->leftJoin('animal_breeds', 'animals.breed_id', '=', 'animal_breeds.id')
            ->leftJoin('animal_dictionary_species', 'animals.id', '=', 'animal_dictionary_species.animal_id')
            ->leftJoin('animal_dictionary', 'animal_dictionary_species.animal_dictionary_id', '=', 'animal_dictionary.id')
            ->leftJoin('genders', 'animal_dictionary.gender_id', '=', 'genders.id')
            ->leftJoin('animal_status', 'animals.animal_status_id', '=', 'animal_status.id')
            ->leftJoin('photos', function ($join) {
                $join->on('animals.id', '=', 'photos.photoable_id')
                    ->where('photos.photoable_type', '=', 'App\Animal');
            })
            ->leftJoin('animal_breed_descriptions', 'animal_breeds.id', '=', 'animal_breed_descriptions.breed_id')
            ->get();

        return $animalsForDatatable;
    }

    public function adminAnimalCharacteristics()
    {
        $datatable = datatables()->of($this->getAnimalCharacteristicsForDatatable())
            ->addColumn('characteristic_dictionary_id', function ($data) {

                $dictionaryCharacteristicId = '<span data-characteristic-dictionary-id="' . $data->characteristic_dictionary_id . '">' . $data->characteristic_dictionary_id . '</span>';
                return $dictionaryCharacteristicId;
            })
            ->addColumn('characteristic_dictionary_name', function ($data) {

                $dictionaryCharacteristicName = '<span class="characteristic-dictionary-name" data-characteristic-dictionary-id="' . $data->characteristic_dictionary_name . '">' . $data->characteristic_dictionary_name . '</span>';
                return $dictionaryCharacteristicName;
            })
            ->addColumn('characteristic_dictionary_created_at', function ($data) {

                $dictionaryCharacteristicCreatedAt = '<span>' . $data->characteristic_dictionary_created_at . '</span>';
                return $dictionaryCharacteristicCreatedAt;
            })
            ->addColumn('characteristic_dictionary_created_user_id', function ($data) {

                $linkToUser = route('user', ['id' => $data->characteristic_dictionary_created_user_id]);
                $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->created_user_name . ' ' . $data->created_user_surname . '</a>';
                return $nameAndSurname;
            })
            ->addColumn('characteristic_dictionary_edited_at', function ($data) {
                $dictionaryCharacteristcEdutedAt = ($data->characteristic_dictionary_edited_at) ? '<span>' . $data->characteristic_dictionary_edited_at . '</span>' : '<span>Brak</span>';
                return $dictionaryCharacteristcEdutedAt;
            })
            ->addColumn('characteristic_dictionary_edited_user_id', function ($data) {
                if ($data->characteristic_dictionary_edited_user_id) {
                    $linkToUser = route('user', ['id' => $data->characteristic_dictionary_edited_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->edited_user_name . ' ' . $data->edited_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;
            })
            ->addColumn('characteristic_dictionary_deleted_at', function ($data) {
                $dictionaryCharacteristicDeletedAt = ($data->characteristic_dictionary_deleted_at) ? '<span>' . $data->characteristic_dictionary_deleted_at . '</span>' : '<span>Brak</span>';
                return $dictionaryCharacteristicDeletedAt;
            })
            ->addColumn('characteristic_dictionary_deleted_user_id', function ($data) {
                if ($data->characteristic_dictionary_deleted_user_id) {
                    $linkToUser = route('user', ['id' => $data->characteristic_dictionary_deleted_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->deleted_user_name . ' ' . $data->deleted_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;

            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-dictionary-characteristic waves-effect waves-light" data-characteristic-dictionary-id="' . $data->characteristic_dictionary_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>';

                if ($data->characteristic_dictionary_deleted_at) {
                    $actions .= '<button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-dark-green border-none restore-dictionary-characteristic waves-effect waves-light" data-characteristic-dictionary-id="' . $data->characteristic_dictionary_id . '">
                                    <i class="fas fa-undo"></i>
                                </button>';
                } else {
                    $actions .= '<button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-dictionary-characteristic waves-effect waves-light" data-characteristic-dictionary-id="' . $data->characteristic_dictionary_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>';
                }
                $actions .= '</div>';

                return $actions;

            })
            ->rawColumns(['characteristic_dictionary_id', 'characteristic_dictionary_name', 'characteristic_dictionary_created_at', 'characteristic_dictionary_created_user_id', 'characteristic_dictionary_edited_at', 'characteristic_dictionary_edited_user_id', 'characteristic_dictionary_deleted_at', 'characteristic_dictionary_deleted_user_id',  'action'])
            ->make(true);

        return $datatable;
    }

    public function getAnimalCharacteristicsForDatatable()
    {
        $animalCharacteristicDictionaryForDatatable = DB::table('characteristic_dictionary AS chd')
            ->select(
                'chd.id as characteristic_dictionary_id',
                'chd.name as characteristic_dictionary_name',
                'chd.created_at AS characteristic_dictionary_created_at',
                'chd.created_user_id AS characteristic_dictionary_created_user_id',
                'chd.edited_at AS characteristic_dictionary_edited_at',
                'chd.edited_user_id AS characteristic_dictionary_edited_user_id',
                'chd.deleted_at AS characteristic_dictionary_deleted_at',
                'chd.deleted_user_id AS characteristic_dictionary_deleted_user_id',
                'created_user.name AS created_user_name',
                'created_user.surname AS created_user_surname',
                'edited_user.name AS edited_user_name',
                'edited_user.surname AS edited_user_surname',
                'deleted_user.name AS deleted_user_name',
                'deleted_user.surname AS deleted_user_surname'
            )
            ->leftJoin('users AS created_user', 'chd.created_user_id', '=', 'created_user.id')
            ->leftJoin('users AS edited_user', 'chd.edited_user_id', '=', 'edited_user.id')
            ->leftJoin('users AS deleted_user', 'chd.deleted_user_id', '=', 'deleted_user.id')
            ->get();
        return $animalCharacteristicDictionaryForDatatable;
    }

    public function adminViolationReports()
    {
        $datatable = datatables()->of($this->getViolationReportsForDatatable())
            ->addColumn('violation_report_id', function ($data) {

                $violationReportId = '<span data-violation-report-id="' . $data->violation_report_id . '">' . $data->violation_report_id . '</span>';
                return $violationReportId;
            })
            ->addColumn('violation_report_type', function ($data) {

                if ($data->violation_report_violationable_type === 'App\Animal') {
                    $violationReportTypeName = 'Zwierzak';
                } elseif ($data->violation_report_violationable_type === 'App\Shelter') {
                    $violationReportTypeName = 'Schronisko';
                } else {
                    $violationReportTypeName = 'Inne';
                }

                $violationReportType = '<span data-violation-report-type="' . $data->violation_report_violationable_type . '">' . $violationReportTypeName . '</span>';
                return $violationReportType;
            })
            ->addColumn('violation_report_type_link', function ($data) {

                if ($data->violation_report_violationable_type === 'App\Animal') {

                    $linkToAnimal = route('animal', ['id' => $data->violation_report_violationable_id]);
                    $violationReportTypeLink = '<a href="' . $linkToAnimal . '">' . $data->animal_name . '</a>';

                } elseif ($data->violation_report_violationable_type === 'App\Shelter') {

                    $linkToShelter = route('shelter', ['id' => $data->violation_report_violationable_id]);
                    $violationReportTypeLink = '<a href="' . $linkToShelter . '">' . $data->shelter_name . '</a>';

                } else {
                    $violationReportTypeLink = 'Inne';
                }

                return $violationReportTypeLink;
            })
            ->addColumn('violation_report_reason', function ($data) {

                $violationReportReason = '<span>' . $data->report_violation_reason . '</span>';
                return $violationReportReason;
            })
            ->addColumn('violation_report_text', function ($data) {

                $violationReportText = '<span>' . $data->report_violation_text . '</span>';
                return $violationReportText;
            })
            ->addColumn('added_user', function ($data) {

                if ($data->user_id) {
                    $linkToUser = route('user', ['id' => $data->user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->user_name . ' ' . $data->user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Zgłoszenie anonimowe</span>';
                }

                return $nameAndSurname;
            })
            ->addColumn('violation_report_ip_address', function ($data) {

                $violationReportIpAddress = '<span>' . $data->ip_address . '</span>';
                return $violationReportIpAddress;
            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-species waves-effect waves-light" data-species-id="' . $data->violation_report_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-species waves-effect waves-light" data-species-id="' . $data->violation_report_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>';
                return $actions;
            })
            ->rawColumns(['violation_report_id', 'violation_report_type', 'violation_report_type_link', 'violation_report_reason', 'violation_report_text', 'added_user', 'violation_report_ip_address', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getViolationReportsForDatatable()
    {
        $violationReportsForDatatable = DB::table('violation_reports AS vr')
            ->select(
                'vr.id AS violation_report_id',
                'vr.violationable_type AS violation_report_violationable_type',
                'vr.violationable_id AS violation_report_violationable_id',
                'vr.report_violation_reason AS report_violation_reason',
                'vr.report_violation_text AS report_violation_text',
                'vr.ip_address',
                'vr.created_at',
                'vr.user_id',
                'u.name AS user_name',
                'u.surname AS user_surname',
                's.name AS shelter_name',
                'a.name AS animal_name'
            )
            ->leftJoin('users as u', 'vr.user_id', '=', 'u.id')
            ->leftJoin('shelters as s', 'vr.violationable_id', '=', 's.id')
            ->leftJoin('animals as a', 'vr.violationable_id', '=', 'a.id')
            ->get();
        return $violationReportsForDatatable;
    }

    public function adminAnimalColors()
    {
        $datatable = datatables()->of($this->getAnimalColorsForDatatable())
            ->addColumn('animal_color_id', function ($data) {

                $animalColorId = '<span data-animal-color-id="' . $data->animal_color_id . '">' . $data->animal_color_id . '</span>';
                return $animalColorId;
            })
            ->addColumn('animal_color_name', function ($data) {

                $animalColorName = '<span class="animal-color-name" data-animal-color-id="' . $data->animal_color_id . '">' . $data->animal_color_name . '</span>';
                return $animalColorName;
            })
            ->addColumn('animal_color_created_at', function ($data) {

                $animalColorCreatedAt = '<span>' . $data->animal_color_created_at . '</span>';
                return $animalColorCreatedAt;
            })
            ->addColumn('added_user', function ($data) {

                $linkToUser = route('user', ['id' => $data->animal_color_created_user_id]);
                $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->created_user_name . ' ' . $data->created_user_surname . '</a>';
                return $nameAndSurname;
            })
            ->addColumn('animal_color_edited_at', function ($data) {
                $animalColorEditedAt = ($data->animal_color_edited_at) ? '<span>' . $data->animal_color_edited_at . '</span>' : '<span>Brak</span>';
                return $animalColorEditedAt;
            })
            ->addColumn('edited_user', function ($data) {
                if ($data->animal_color_edited_user_id) {
                    $linkToUser = route('user', ['id' => $data->animal_color_edited_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->edited_user_name . ' ' . $data->edited_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;
            })
            ->addColumn('animal_color_deleted_at', function ($data) {
                $animalColorDeletedAt = ($data->animal_color_deleted_at) ? '<span>' . $data->animal_color_deleted_at . '</span>' : '<span>Brak</span>';
                return $animalColorDeletedAt;
            })
            ->addColumn('deleted_user', function ($data) {
                if ($data->animal_color_deleted_user_id) {
                    $linkToUser = route('user', ['id' => $data->animal_color_deleted_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->deleted_user_name . ' ' . $data->deleted_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;

            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-animal-color waves-effect waves-light" data-animal-color-id="' . $data->animal_color_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>';

                if ($data->animal_color_deleted_at) {
                    $actions .= '<button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-dark-green border-none restore-animal-color waves-effect waves-light" data-animal-color-id="' . $data->animal_color_id . '">
                                    <i class="fas fa-undo"></i>
                                </button>';
                } else {
                    $actions .= '<button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-animal-color waves-effect waves-light" data-animal-color-id="' . $data->animal_color_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>';
                }
                $actions .= '</div>';

                return $actions;

            })
            ->rawColumns(['animal_color_id', 'animal_color_name', 'animal_color_created_at', 'added_user', 'animal_color_edited_at', 'edited_user', 'animal_color_deleted_at', 'deleted_user', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getAnimalColorsForDatatable()
    {
        $animalColorsForDatatable = DB::table('animal_colors AS ac')
            ->select(
                'ac.id as animal_color_id',
                'ac.name as animal_color_name',
                'ac.created_at AS animal_color_created_at',
                'ac.created_user_id AS animal_color_created_user_id',
                'ac.edited_at AS animal_color_edited_at',
                'ac.edited_user_id AS animal_color_edited_user_id',
                'ac.deleted_at AS animal_color_deleted_at',
                'ac.deleted_user_id AS animal_color_deleted_user_id',
                'created_user.name AS created_user_name',
                'created_user.surname AS created_user_surname',
                'edited_user.name AS edited_user_name',
                'edited_user.surname AS edited_user_surname',
                'deleted_user.name AS deleted_user_name',
                'deleted_user.surname AS deleted_user_surname'
            )
            ->leftJoin('users AS created_user', 'ac.created_user_id', '=', 'created_user.id')
            ->leftJoin('users AS edited_user', 'ac.edited_user_id', '=', 'edited_user.id')
            ->leftJoin('users AS deleted_user', 'ac.deleted_user_id', '=', 'deleted_user.id')
            ->get();
        return $animalColorsForDatatable;
    }

    public function storeAnimalColor($request)
    {
        $colorName = strtolower($request->colorName);
        $isExist = AnimalColor::where('name', '=', $colorName)->exists();

        if ($isExist) {
            return response()->json(['errors' => ['Taki kolor już istnieje.']]);
        }

        AnimalColor::create([
            'name' => $colorName,
            'created_at' => Carbon::now('Europe/Warsaw'),
            'created_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => 'Dodano nowy kolor.']);
    }

    public function updateAnimalColor($request)
    {
        $colorName = strtolower($request->colorName);
        $isExist = AnimalColor::where('name', '=', $colorName)->where('id', '!=', $request->animalColorId)->exists();


        if ($isExist) {
            return response()->json(['errors' => ['Taki kolor już istnieje.']]);
        }

        AnimalColor::where('id', '=', $request->animalColorId)->update([
            'name' => $colorName,
            'edited_at' => Carbon::now('Europe/Warsaw'),
            'edited_user_id' => Auth::user()->id,
        ]);


        return response()->json(['success' => 'Edycja zakończona pomyślnie.']);
    }

    public function deleteAnimalColor($request)
    {
        $isExist = AnimalColor::where('id', '=', $request->animalColorId)->exists();

        if (!$isExist) {
            return response()->json(['errors' => ['Nie znaleziono takiego koloru.']]);
        }

        AnimalColor::where('id', '=', $request->animalColorId)->update([
            'deleted_at' => Carbon::now('Europe/Warsaw'),
            'deleted_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => 'Kolor został usunięty.']);

    }

    public function restoreAnimalColor($request)
    {
        $isExist = AnimalColor::where('id', '=', $request->animalColorId)->exists();

        if (!$isExist) {
            return response()->json(['errors' => [__('Nie znaleniono takiego koloru.')]]);
        }

        AnimalColor::where('id', '=', $request->animalColorId)->update([
            'deleted_at' => null,
            'deleted_user_id' => null,
        ]);

        return response()->json(['success' => 'Przywracanie zakończone pomyślnie.']);
    }

    public function storeAnimalCharacteristic($request)
    {
        $isExist = CharacteristicDictionary::where('name', '=', $request->characteristicName)->exists();

        if ($isExist) {
            return response()->json(['errors' => ['Taka cecha zwierzaka już istnieje.']]);
        }

        CharacteristicDictionary::create([
            'name' => $request->characteristicName,
            'created_at' => Carbon::now('Europe/Warsaw'),
            'created_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => 'Dodano nową cechę zwierzaka.']);
    }

    public function updateAnimalCharacteristic($request)
    {
        $isExist = CharacteristicDictionary::where('name', '=', $request->characteristicName)->where('id', '!=', $request->animalColorId)->exists();


        if ($isExist) {
            return response()->json(['errors' => ['Taka cecha zwierzaka już istnieje.']]);
        }

        CharacteristicDictionary::where('id', '=', $request->animalCharacteristicId)->update([
            'name' => $request->characteristicName,
            'edited_at' => Carbon::now('Europe/Warsaw'),
            'edited_user_id' => Auth::user()->id,
        ]);


        return response()->json(['success' => 'Edycja zakończona pomyślnie.']);
    }

    public function deleteAnimalCharacteristic($request)
    {
        $isExist = CharacteristicDictionary::where('id', '=', $request->animalCharacteristicId)->exists();

        if (!$isExist) {
            return response()->json(['errors' => ['Nie znaleziono takiej cechy zwierzaka.']]);
        }

        $animalColor = CharacteristicDictionary::findOrFail($request->animalCharacteristicId);
        $animalColor->delete();

        return response()->json(['success' => 'Cecha zwierzaka została usunięta.']);
    }

    public function storeAnimalSpecies($request)
    {
        $isExist = AnimalSpecies::where('name', '=', $request->speciesName)->exists();

        if ($isExist) {
            return response()->json(['errors' => [__('Taki gatunek już istnieje.')]]);
        }

        AnimalSpecies::create([
            'name' => $request->speciesName,
            'created_at' => Carbon::now('Europe/Warsaw'),
            'created_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => __('Dodano nawy gatunek.')]);
    }

    public function updateAnimalSpecies($request)
    {
        $isExist = AnimalSpecies::where('name', '=', $request->speciesName)->where('id', '!=', $request->animalSpeciesId)->exists();


        if ($isExist) {
            return response()->json(['errors' => [__('Taki gatunek już istnieje.')]]);
        }

        AnimalSpecies::where('id', '=', $request->animalSpeciesId)->update([
            'name' => $request->speciesName,
            'edited_at' => Carbon::now('Europe/Warsaw'),
            'edited_user_id' => Auth::user()->id,
        ]);


        return response()->json(['success' => __('Edycja zakończona pomyślnie.')]);
    }

    public function deleteAnimalSpecies($request)
    {
        $isExist = AnimalSpecies::where('id', '=', $request->animalSpeciesId)->exists();

        if (!$isExist) {
            return response()->json(['errors' => [__('Nie znaleziono takiego gatunku.')]]);
        }

        $animalColor = AnimalSpecies::findOrFail($request->animalSpeciesId);
        $animalColor->delete();

        return response()->json(['success' => __('Cecha zwierzaka została usunięta.')]);
    }

    public function adminAnimalFur()
    {
        $datatable = datatables()->of($this->getAnimalFurForDatatable())
            ->addColumn('animal_fur_id', function ($data) {

                $animalFurId = '<span data-animal-fur-id="' . $data->fur_id . '">' . $data->fur_id . '</span>';
                return $animalFurId;
            })
            ->addColumn('animal_fur_name', function ($data) {

                $animalSpeciesName = '<span class="animal-fur-name" data-animal-fur-id="' . $data->fur_id . '">' . $data->fur_name . '</span>';
                return $animalSpeciesName;
            })
            ->addColumn('fur_created_at', function ($data) {

                $animalFurCreatedAt = '<span>' . $data->fur_created_at . '</span>';
                return $animalFurCreatedAt;
            })
            ->addColumn('added_user', function ($data) {

                $linkToUser = route('user', ['id' => $data->fur_created_user_id]);
                $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->created_user_name . ' ' . $data->created_user_surname . '</a>';
                return $nameAndSurname;
            })
            ->addColumn('fur_edited_at', function ($data) {
                $animalFurEditeddAt = ($data->fur_edited_at) ? '<span>' . $data->fur_edited_at . '</span>' : '<span>Brak</span>';
                return $animalFurEditeddAt;
            })
            ->addColumn('edited_user', function ($data) {
                if ($data->fur_edited_user_id) {
                    $linkToUser = route('user', ['id' => $data->fur_edited_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->edited_user_name . ' ' . $data->edited_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;
            })
            ->addColumn('fur_deleted_at', function ($data) {
                $animalFurDeletedAt = ($data->fur_deleted_at) ? '<span>' . $data->fur_deleted_at . '</span>' : '<span>Brak</span>';
                return $animalFurDeletedAt;
            })
            ->addColumn('deleted_user', function ($data) {
                if ($data->fur_deleted_user_id) {
                    $linkToUser = route('user', ['id' => $data->fur_deleted_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->deleted_user_name . ' ' . $data->deleted_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;

            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-animal-fur waves-effect waves-light" data-animal-fur-id="' . $data->fur_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>';

                if ($data->fur_deleted_at) {
                    $actions .= '<button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-dark-green border-none restore-animal-fur waves-effect waves-light" data-animal-fur-id="' . $data->fur_id . '">
                                    <i class="fas fa-undo"></i>
                                </button>';
                } else {
                    $actions .= '<button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-animal-fur waves-effect waves-light" data-animal-fur-id="' . $data->fur_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>';
                }
                $actions .= '</div>';

                return $actions;

            })
            ->rawColumns(['animal_fur_id', 'animal_fur_name', 'fur_created_at', 'added_user', 'fur_edited_at', 'edited_user', 'fur_deleted_at', 'deleted_user', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getAnimalFurForDatatable()
    {
        $animalFursForDatatable = DB::table('fur AS f')
            ->select(
                'f.id AS fur_id',
                'f.name AS fur_name',
                'f.created_at AS fur_created_at',
                'f.created_user_id AS fur_created_user_id',
                'f.edited_at AS fur_edited_at',
                'f.edited_user_id AS fur_edited_user_id',
                'f.deleted_at AS fur_deleted_at',
                'f.deleted_user_id AS fur_deleted_user_id',
                'created_user.name AS created_user_name',
                'created_user.surname AS created_user_surname',
                'edited_user.name AS edited_user_name',
                'edited_user.surname AS edited_user_surname',
                'deleted_user.name AS deleted_user_name',
                'deleted_user.surname AS deleted_user_surname'
            )
            ->leftJoin('users AS created_user', 'f.created_user_id', '=', 'created_user.id')
            ->leftJoin('users AS edited_user', 'f.edited_user_id', '=', 'edited_user.id')
            ->leftJoin('users AS deleted_user', 'f.deleted_user_id', '=', 'deleted_user.id')

            ->get();
        return $animalFursForDatatable;
    }

    public function storeAnimalFur($request)
    {

        $furName = trim(strtolower($request->furName));
        $isExist = Fur::where('name', '=', $furName)->exists();

        if ($isExist) {
            return response()->json(['errors' => [__('Taka długość futra już istnieje.')]]);
        }

        Fur::create([
            'name' => $furName,
            'created_at' => Carbon::now('Europe/Warsaw'),
            'created_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => __('Dodano nawą długość futra.')]);
    }

    public function updateAnimalFur($request)
    {
        $furName = trim(strtolower($request->furName));

        $isExist = Fur::where('name', '=', $furName)->where('id', '!=', $request->animalFurId)->exists();


        if ($isExist) {
            return response()->json(['errors' => ['Taka długość futra już istnieje.']]);
        }

        Fur::where('id', '=', $request->animalFurId)->update([
            'name' => $furName,
            'edited_at' => Carbon::now('Europe/Warsaw'),
            'edited_user_id' => Auth::user()->id,
        ]);


        return response()->json(['success' => 'Edycja zakończona pomyślnie.']);
    }

    public function deleteAnimalFur($request)
    {
        $isExist = Fur::where('id', '=', $request->animalFurId)->exists();

        if (!$isExist) {
            return response()->json(['errors' => [__('Nie znaleziono takiej długości futra.')]]);
        }

        Fur::where('id', '=', $request->animalFurId)->update([
            'deleted_at' => Carbon::now('Europe/Warsaw'),
            'deleted_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => 'Usuwanie zakończone pomyślnie.']);
    }

    public function restoreAnimalFur($request){

        $isExist = Fur::where('id', '=', $request->animalFurId)->exists();

        if (!$isExist) {
            return response()->json(['errors' => [__('Nie znaleziono takiej długości futra.')]]);
        }

        Fur::where('id', '=', $request->animalFurId)->update([
            'deleted_at' => null,
            'deleted_user_id' => null,
        ]);

        return response()->json(['success' => 'Przywracanie zakończone pomyślnie.']);
    }

    public function adminAnimalSize()
    {
        $datatable = datatables()->of($this->getAnimalSizeForDatatable())
            ->addColumn('animal_size_id', function ($data) {

                $animalSizeId = '<span data-animal-size-id="' . $data->size_id . '">' . $data->size_id . '</span>';
                return $animalSizeId;
            })
            ->addColumn('animal_size_name', function ($data) {

                $animalSizeName = '<span class="animal-size-name" data-animal-size-id="' . $data->size_id . '">' . $data->size_name . '</span>';
                return $animalSizeName;
            })
            ->addColumn('size_created_at', function ($data) {

                $animalSizeCreatedAt = '<span>' . $data->size_created_at . '</span>';
                return $animalSizeCreatedAt;
            })
            ->addColumn('added_user', function ($data) {

                $linkToUser = route('user', ['id' => $data->size_created_user_id]);
                $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->created_user_name . ' ' . $data->created_user_surname . '</a>';
                return $nameAndSurname;
            })
            ->addColumn('size_edited_at', function ($data) {
                $animalSizeEditeddAt = ($data->size_edited_at) ? '<span>' . $data->size_edited_at . '</span>' : '<span>Brak</span>';
                return $animalSizeEditeddAt;
            })
            ->addColumn('edited_user', function ($data) {
                if ($data->size_edited_user_id) {
                    $linkToUser = route('user', ['id' => $data->size_edited_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->edited_user_name . ' ' . $data->edited_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;

            })
            ->addColumn('size_deleted_at', function ($data) {
                $animalSizeDeletedAt = ($data->size_deleted_at) ? '<span>' . $data->size_deleted_at . '</span>' : '<span>Brak</span>';
                return $animalSizeDeletedAt;
            })
            ->addColumn('deleted_user', function ($data) {
                if ($data->size_deleted_user_id) {
                    $linkToUser = route('user', ['id' => $data->size_deleted_user_id]);
                    $nameAndSurname = '<a href="' . $linkToUser . '">' . $data->deleted_user_name . ' ' . $data->deleted_user_surname . '</a>';
                } else {
                    $nameAndSurname = '<span>Brak</span>';
                }
                return $nameAndSurname;

            })
            ->addColumn('action', function ($data) {

                $actions = '<div class="d-flex">
                                <button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-yellow border-none edit-animal-size waves-effect waves-light" data-animal-size-id="' . $data->size_id . '">
                                    <i class="fas fa-edit"></i>
                                </button>';

                if ($data->size_deleted_at) {
                    $actions .= '<button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-dark-green border-none restore-animal-size waves-effect waves-light" data-animal-size-id="' . $data->size_id . '">
                                    <i class="fas fa-undo"></i>
                                </button>';
                } else {
                    $actions .= '<button class="ml-2 mr-2 mt-0 mb-0 btn-floating btn-sm btn-danger border-none delete-animal-size waves-effect waves-light" data-animal-size-id="' . $data->size_id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>';
                }
                $actions .= '</div>';

                return $actions;
            })
            ->rawColumns(['animal_size_id', 'animal_size_name', 'size_created_at', 'added_user', 'size_edited_at', 'edited_user', 'size_deleted_at', 'deleted_user', 'action'])
            ->make(true);

        return $datatable;
    }

    public function getAnimalSizeForDatatable()
    {
        $animalSizeForDatatable = DB::table('animal_sizes AS asz')
            ->select(
                'asz.id AS size_id',
                'asz.name AS size_name',
                'asz.created_at AS size_created_at',
                'asz.created_user_id AS size_created_user_id',
                'asz.edited_at AS size_edited_at',
                'asz.edited_user_id AS size_edited_user_id',
                'asz.deleted_at AS size_deleted_at',
                'asz.deleted_user_id AS size_deleted_user_id',
                'created_user.name AS created_user_name',
                'created_user.surname AS created_user_surname',
                'edited_user.name AS edited_user_name',
                'edited_user.surname AS edited_user_surname',
                'deleted_user.name AS deleted_user_name',
                'deleted_user.surname AS deleted_user_surname'
            )
            ->leftJoin('users AS created_user', 'asz.created_user_id', '=', 'created_user.id')
            ->leftJoin('users AS edited_user', 'asz.edited_user_id', '=', 'edited_user.id')
            ->leftJoin('users AS deleted_user', 'asz.edited_user_id', '=', 'deleted_user.id')
            ->get();

        return $animalSizeForDatatable;
    }

    public function storeAnimalSize($request)
    {
        $sizeName = trim(strtolower($request->sizeName));
        $isExist = AnimalSize::where('name', '=', $sizeName)->exists();

        if ($isExist) {
            return response()->json(['errors' => [__('Taka wielkość zwierzaka już istnieje.')]]);
        }

        AnimalSize::create([
            'name' => $sizeName,
            'created_at' => Carbon::now('Europe/Warsaw'),
            'created_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => __('Dodano nawą wielkość zwierzaka.')]);
    }

    public function updateAnimalSize($request)
    {
        $sizeName = trim(strtolower($request->sizeName));

        $isExist = AnimalSize::where('name', '=', $sizeName)->where('id', '!=', $request->animalSizeId)->exists();

        if ($isExist) {
            return response()->json(['errors' => ['Taka wielkość zwierzaka już istnieje.']]);
        }

        AnimalSize::where('id', '=', $request->animalSizeId)->update([
            'name' => $sizeName,
            'edited_at' => Carbon::now('Europe/Warsaw'),
            'edited_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => 'Edycja zakończona pomyślnie.']);
    }

    public function deleteAnimalSize($request)
    {
        $isExist = AnimalSize::where('id', '=', $request->animalSizeId)->exists();

        if (!$isExist) {
            return response()->json(['errors' => [__('Nie znaleziono takiej wielkości zwierzaka.')]]);
        }

        AnimalSize::where('id', '=', $request->animalSizeId)->update([
            'deleted_at' => Carbon::now('Europe/Warsaw'),
            'deleted_user_id' => Auth::user()->id,
        ]);

        return response()->json(['success' => 'Usuwanie zakończone pomyślnie.']);
    }

    public function restoreAnimalSize($request)
    {
        $isExist = AnimalSize::where('id', '=', $request->animalSizeId)->exists();

        if (!$isExist) {
            return response()->json(['errors' => [__('Nie znaleziono takiej wielkości zwierzaka.')]]);
        }

        AnimalSize::where('id', '=', $request->animalSizeId)->update([
            'deleted_at' => null,
            'deleted_user_id' => null,
        ]);

        return response()->json(['success' => 'Przywracanie zakończone pomyślnie.']);
    }
}
