<?php

namespace App\Hipuppy\Repositories;

use App\Hipuppy\Interfaces\AddAnimalRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\{Address,
    Animal,
    AnimalBreed,
    AnimalCharacteristic,
    AnimalDictionarySpecies,
    AnimalSpecies,
    AvailableCharacteristicDictionary,
    AvailableFurs,
    AnimalSize,
    AvailableColors,
    Gender,
    Photo
};
use Illuminate\Support\Facades\DB;

class AddAnimalRepository implements AddAnimalRepositoryInterface
{
    public function getSpeciesForAddAnimal($request)
    {
        if (isset($request->speciesId)) {
            $species = AnimalSpecies::whereNull('deleted_at')->where('species_id', '=', $request->speciesId)->get();
        } else {
            $species = AnimalSpecies::whereNull('deleted_at')->get();
        }

        $speciesCollection = $species->map(function ($singleSpecies) {
            return collect($singleSpecies->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json(['success' => $speciesCollection]);
    }

    public function getBreedsForAddAnimal($request)
    {
        $breedCollection = DB::table('animal_breeds AS ab')
            ->select(
                'ab.id as id',
                'ab.name as name'
            )
            ->where('ab.species_id', '=', $request->speciesId)->whereNull('ab.deleted_at')->get();

        return response()->json(['success' => $breedCollection]);
    }

    public function getCharacteristicsForAddAnimal($request)
    {
        $characteristics = DB::table('available_characteristic_dictionary AS achd')
            ->select(
                'chd.id as id',
                'chd.name as name'
            )
            ->leftJoin('characteristic_dictionary AS chd', 'achd.characteristic_dictionary_id', '=', 'chd.id')
            ->where('achd.species_id', '=', $request->speciesId)->whereNull('chd.deleted_at')->get();

        return response()->json(['success' => $characteristics]);
    }

    public function getGendersForAddAnimal()
    {
        $genders = Gender::whereNull('deleted_at')->get();

        $genderCollection = $genders->map(function ($gender) {
            return collect($gender->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json(['success' => $genderCollection]);
    }

    public function getSizesForAddAnimal()
    {
        $sizes = AnimalSize::whereNull('deleted_at')->get();

        $sizeCollection = $sizes->map(function ($size) {
            return collect($size->toArray())
                ->only(['id', 'name'])
                ->all();
        });

        return response()->json(['success' => $sizeCollection]);
    }

    public function getColorsForAddAnimal($request)
    {
        $availableColors = DB::table('available_colors AS ac')
            ->select(
                'acol.id as color_id',
                'acol.name as color_name'
            )
            ->leftJoin('animal_colors AS acol', 'ac.color_id', '=', 'acol.id')
            ->where('ac.breed_id', '=', $request->breedId)->whereNull('acol.deleted_at')->get();

        return response()->json(['success' => $availableColors]);
    }

    public function getFursForAddAnimal($request)
    {
        $availableFurs = DB::table('available_furs AS af')
            ->select(
                'f.id as fur_id',
                'f.name as fur_name'
            )
            ->leftJoin('fur AS f', 'af.fur_id', '=', 'f.id')
            ->where('af.breed_id', '=', $request->breedId)->whereNull('f.deleted_at')->get();

        return response()->json(['success' => $availableFurs]);
    }

    public function createAnimal($request)
    {
        $errors = [];

        if ($request->has('speciesId')) {

            $isExistSpecies = AnimalSpecies::where('id', '=', $request->speciesId)
                ->whereNull('deleted_at')
                ->exists();

            if (!$isExistSpecies) {
                array_push($errors, 'Wybrano błędny gatunek zwierzaka');
            }
        }

        if ($request->has('breedId')) {
            if ($request->has('speciesId')) {

                $isExistBreed = AnimalBreed::where('id', '=', $request->breedId)
                    ->where('species_id', '=', $request->speciesId)
                    ->whereNull('deleted_at')
                    ->exists();

                if (!$isExistBreed) {
                    array_push($errors, 'Podano błędą rasę zwierzaka');
                }

            } else {
                array_push($errors, 'Podano błędą rasę zwierzaka');
            }
        }

        if ($request->has('genderId')) {

            $isExistGender = Gender::where('id', '=', $request->genderId)
                ->whereNull('deleted_at')
                ->exists();

            if (!$isExistGender) {
                array_push($errors, 'Wybrano błędną płeć zwierzaka');
            }
        }

        if ($request->has('sizeId')) {

            $isExistSize = AnimalSize::where('id', '=', $request->sizeId)
                ->whereNull('deleted_at')
                ->exists();

            if (!$isExistSize) {
                array_push($errors, 'Wybrano błędną wielkość zwierzaka');
            }
        }

        if ($request->has('animalFur')) {
            if ($request->has('breedId')) {

                $isExistFur = AvailableFurs::where('breed_id', '=', $request->breedId)
                    ->where('fur_id', '=', $request->animalFur)
                    ->exists();

                if (!$isExistFur) {
                    array_push($errors, 'Wybrano błędną długość futra zwierzaka');
                }

            } else {
                array_push($errors, 'Wybrano błędną długość futra zwierzaka');
            }
        }

        if ($request->has('animalColor')) {
            if ($request->has('breedId')) {

                $isExistFur = AvailableColors::where('breed_id', '=', $request->breedId)
                    ->where('color_id', '=', $request->animalColor)
                    ->exists();

                if (!$isExistFur) {
                    array_push($errors, 'Wybrano błędny kolor futra zwierzaka');
                }

            } else {
                array_push($errors, 'Wybrano błędny kolor futra zwierzaka');
            }
        }

        if ($request->has('animalCharacteristics')) {
            if ($request->has('speciesId')) {

                foreach ($request->animalCharacteristics as $animalCharacteristic) {

                    $isExistCharacteristic = AvailableCharacteristicDictionary::where('species_id', '=', $request->speciesId)
                        ->where('characteristic_dictionary_id', '=', $animalCharacteristic)
                        ->exists();

                    if (!$isExistCharacteristic) {
                        array_push($errors, 'Wybrano błędną cechę zwierzaka');
                        break;
                    }
                }

            } else {
                array_push($errors, 'Wybrano błędną cechę zwierzaka');
            }
        }
        $breedMix = false;

        if ($request->has('inBreedType')) {

            if ($request->inBreedType === 'on') {
                $breedMix = true;
            } else {
                $breedMix = false;
            }
        }
        if (empty($errors)) {


            if (Auth::user()->hasRole(['shelter'])) {
                $animalAbleType = 'App\Shelter';
                $animalAbleId = DB::table('shelters AS s')
                    ->select(
                        's.id'
                    )
                    ->where('s.user_id', '=', Auth::user()->id)->whereNull('s.deleted_at')->get();

                $animalAbleId = $animalAbleId[0]->id;
                $recommended = true;

            } else {
                $animalAbleType = 'App\User';
                $animalAbleId = Auth::user()->id;
                $recommended = false;
            }
            DB::beginTransaction();

            try {

                $animalDictionaryId =  DB::table('animal_dictionary AS ad')
                    ->select(
                        'ad.id'
                    )
                    ->where('ad.gender_id', '=', $request->genderId)
                    ->where('ad.species_id', '=', $request->speciesId)
                    ->whereNull('ad.deleted_at')->get();

            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak. 1');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            try {

                $animal = new Animal;
                $animal->title = null;
                $animal->name = $request->animalName;
                $animal->age = $request->animalAge;
                $animal->description = $request->animalDescription;
                $animal->price = null;
                $animal->animalable_type = $animalAbleType;
                $animal->animalable_id = $animalAbleId;
                $animal->species_id = $request->speciesId;
                $animal->color_id = $request->animalColor;
                $animal->fur_id = $request->animalFur;
                $animal->size_id = $request->sizeId;
                $animal->breed_id = $request->breedId;
                $animal->breed_mix = $breedMix;
                $animal->animal_status_id = 1;
                $animal->recommended = $recommended;
                $animal->created_at = Carbon::now('Europe/Warsaw');
                $animal->created_user_id = Auth::user()->id;
                $animal->save();

            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak. 1');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            try {

                AnimalDictionarySpecies::create([
                    'animal_id' => $animal->id,
                    'animal_dictionary_id' => $animalDictionaryId[0]->id,
                    'created_at' => Carbon::now('Europe/Warsaw'),
                    'created_user_id' => Auth::user()->id,
                ]);


            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            if ($request->hasFile('images')){

                try {

                    foreach ($request->images as $image) {

                        $path = $image->store('animals', 'public');

                        $photo = new Photo;
                        $photo->path = $path;
                        $animal->photos()->save($photo);
                    }

                } catch (ValidationException $e) {
                    DB::rollback();
                    return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak.');
                } catch (\Exception $e) {
                    DB::rollback();
                    throw $e;
                }
            }

            try {

                foreach ($request->animalCharacteristics as $animalCharacteristic) {
                    AnimalCharacteristic::create([
                        'animal_id' => $animal->id,
                        'characteristic_dictionary_id' => $animalCharacteristic,
                        'character_status' => true,
                        'created_at' => Carbon::now('Europe/Warsaw'),
                        'updated_at' => null,
                    ]);
                }

            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            try {

                Address::create([
                    'addressable_type' => 'App\Animal',
                    'addressable_id' => $animal->id,
                    'city_id' => $request->cityId,
                    'street' => $request->streetName,
                    'number' => $request->streetNumber,
                    'lon' => null,
                    'lat' => null,
                    'created_at' => Carbon::now('Europe/Warsaw'),
                    'created_user_id' => Auth::user()->id,
                ]);


            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            DB::commit();

            return redirect()->back()->with('message', 'Zwierzak został dodany pomyślnie!');

        } else {
            return redirect()->back()->withErrors('message', $errors);
        }
    }
}
