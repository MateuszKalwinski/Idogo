<?php

namespace App\Hipuppy\Repositories;

use App\{AcceptedRegulation,
    Animal,
    AnimalSpecies,
    Article,
    City,
    Phone,
    Regulation,
    Shelter,
    ShelterApplication,
    User,
    ViolationReport};
use App\Hipuppy\Interfaces\FrontendRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendRepository implements FrontendRepositoryInterface
{

    public function getAnimalForMainPage($paginate)
    {

        $animals = Animal::with([
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
            ->where('recommended', 1)
            ->where('animal_status_id', 1)
            ->inRandomOrder()
            ->paginate($paginate);
        return $animals;
    }

    public function getSheltersForMainPage($paginate)
    {
        $shelters = Shelter::with([

            'addressable',
            'addressable.city',
            'addressable.city.province',
            'photos',
        ])
            ->where('recommended', 1)
            ->inRandomOrder()
            ->paginate($paginate);


        return $shelters;

    }

    public function getCounter()
    {

        $count_shelters = Shelter::count();
        $count_animals = Animal::count();

        $counter = ['counter_shelters' => $count_shelters, 'counter_animals' => $count_animals];
        return $counter;
    }

    public function getPhoneNumbers($request)
    {

        $result = Phone::select('phone')->where('user_id', $request->user_id)->get();

        return $result;
    }


    public function getAnimalSpecies()
    {

        $species = AnimalSpecies::all();

        return $species;

    }

    public function favouriteAnimal($request)
    {

        $result = [];

        $favouriteable = Animal::find($request->animalId);

        if ($favouriteable == null) {
            $result['errors']['global'] = __('Wygląda na to, że nie znaleźliśmy tego zwierzaka.');
        }

        if (!isset($result['errors'])) {
            $favouriteable->users()->attach($request->user()->id);
        }

        return $result;
    }

    public function notFavouriteAnimal($request)
    {

        $result = [];

        $favouriteable = Animal::find($request->animalId);

        if ($favouriteable == null) {
            $result['errors']['global'] = __('Wygląda na to, że nie znaleźliśmy tego zwierzaka.');
        }

        if (!isset($result['errors'])) {
            $favouriteable->users()->detach($request->user()->id);
        }

        return $result;
    }

    public function favouriteShelter($request)
    {
        $result = [];

        $favouriteable = Shelter::find($request->shelterId);

        if ($favouriteable == null) {
            $result['errors']['global'] = __('Wygląda na to, że nie znaleźliśmy tego schroniska.');
        }

        if (!isset($result['errors'])) {
            $favouriteable->users()->attach($request->user()->id);
        }

        return $result;
    }

    public function notFavouriteShelter($request)
    {
        $result = [];

        $favouriteable = Shelter::find($request->shelterId);

        if ($favouriteable == null) {
            $result['errors']['global'] = __('Wygląda na to, że nie znaleźliśmy tego schroniska.');
        }

        if (!isset($result['errors'])) {
            $favouriteable->users()->detach($request->user()->id);
        }

        return $result;
    }


    public function getSearchCities(string $cityName)
    {
        return City::where('name', 'LIKE', $cityName . '%')->get();
    }

    public function getUser(int $id)
    {

        $user = User::with([
            'addressable',
            'addressable.city',
            'addressable.city.province',
            'photos',
            'phones',
        ])->find($id);

        return $user;

    }

    public function getAnimalForUser(int $user_id)
    {

        $animalsForUser = Animal::with([
            'animalDictionarySpecies',
            'animalDictionarySpecies.animal_dictionary.gender',
            'animalDictionarySpecies.animal_dictionary',
            'animalDictionarySpecies.animal_dictionary.species',
            'photos',
            'animalColor',
            'animalSize',
            'photos',
        ])
            ->where('animalable_type', "App\User")
            ->where('animalable_id', $user_id)
            ->get();

        return $animalsForUser;
    }

    public function createShelterApplication($request)
    {
        DB::beginTransaction();

        try {


        $date = Carbon::now('Europe/Warsaw');
        $date->toDateTimeString();

        $shelter_application = new ShelterApplication;

        $shelter_application->name = $request->input('name');
        $shelter_application->surname = $request->input('surname');
        $shelter_application->email = $request->input('email');
        $shelter_application->phone = $request->input('phone');
        $shelter_application->shelter_name = $request->input('shelterName');
        $shelter_application->street = $request->input('shelterAddress');
        $shelter_application->city = $request->input('shelterCity');
        $shelter_application->zip_code = $request->input('ShelterZipCode');
        $shelter_application->nip = $request->input('ShelterTaxNumber');
        $shelter_application->regon = $request->input('shelterRegonNumber');
        $shelter_application->shelter_application_status_id = 1;
        $shelter_application->created_at = $date;

        $shelter_application->save();
        }catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak. 1');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        try {

            $regulation =  DB::table('regulations AS r')
                ->select(
                    'r.id'
                )
                ->where('r.active', '=', true)
                ->get();

            if (count($regulation) !== 1){
                return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak. 1');
            }

        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak. 1');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {

            $acceptedRegulation = new AcceptedRegulation;
            $acceptedRegulation->regulation_id = $regulation[0]->id;
            $shelter_application->acceptedRegulation()->save($acceptedRegulation);


        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak. 1');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();
        return $shelter_application;
    }

    public function sendReport($request)
    {

        $result = [];

        $user_id = (Auth::user() !== null) ? Auth::user()->id : null;
        $ipv4 = $request->ip();

        $saveViolationReport = ViolationReport::create([
            'violationable_type' => 'App\Animal',
            'violationable_id' => $request->animalId,
            'report_violation_reason' => $request->reportViolationReason,
            'report_violation_text' => $request->reportViolationText,
            'user_id' => $user_id,
            'ip_address' => $ipv4,
        ]);


        if ($saveViolationReport) {
            $result['success']['global'] = __('Twoje zgłoszenie zostało przyjęte.');
        } else {
            $result['errors']['global'] = __('Ups! coś poszło nie tak.');
        }

        return $result;
    }

    public function getRegulation()
    {
        $regulation = Regulation::where('active', '=', 1)->get();

        return $regulation;

    }
}

