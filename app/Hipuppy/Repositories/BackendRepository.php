<?php

namespace App\Hipuppy\Repositories;

use App\{Address, Article, City, Notification, Phone, Photo, Reservation, Room, TouristObject, User};
use App\Hipuppy\Interfaces\BackendRepositoryInterface;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class BackendRepository implements BackendRepositoryInterface
{


    public function getFavourite()
    {

        $favourite = User::with([
            'favourite_animals',
            'favourite_animals.animalDictionarySpecies',
            'favourite_animals.animalDictionarySpecies.animal_dictionary.gender',
            'favourite_animals.animalDictionarySpecies.animal_dictionary',
            'favourite_animals.animalDictionarySpecies.animal_dictionary.species',
            'favourite_animals.photos',
            'favourite_animals.animalColor',
            'favourite_animals.animalSize',
            'favourite_animals.photos',
            'favourite_animals.animalable',
            'favourite_animals.animalable.user',
            'favourite_animals.animalable.user.phones',
            'favourite_animals.animalable.addressable',
            'favourite_animals.animalable.addressable.city',
            'favourite_animals.animalable.addressable.city.province',
            'favourite_shelters',
            'favourite_shelters.addressable',
            'favourite_shelters.addressable.city',
            'favourite_shelters.addressable.city.province',
            'favourite_shelters.photos',

        ])->find(Auth::user()->id);

        return $favourite;
    }

    public function saveUser($request)
    {
        $user = User::find($request->user()->id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->save();

        return $user;
    }

    public function getPhoto($id)
    {
        return Photo::find($id);
    }


    public function updateUserPhoto(User $user, Photo $photo)
    {
        return $user->photos()->save($photo);
    }

    public function createUserPhoto($user, $path)
    {
        $photo = new Photo;
        $photo->path = $path;
        $user->photos()->save($photo);
    }

    public function deletePhoto(Photo $photo)
    {
        $path = $photo->storagepath;
        $photo->delete();
        return $path;
    }

    public function userData()
    {
        $userData = User::with([
            'phones',
            'addressable',
            'addressable.city',
            'addressable.city.province',
        ])
            ->find(Auth::user()->id);

        return $userData;
    }

    public function editPhoneNumber($request)
    {

        $result = [];

        $phone = Phone::where('id', $request->phoneId)->where('user_id', Auth::user()->id)->firstOrFail();

        if ($phone == null) {

            $result['errors']['global'] = __('Wygląda na to, że nie znaleźliśmy tego numeru telefonu.');
        }

        if (!isset($result['errors'])) {
            $savePhone = Phone::where('id', $request->phoneId)->where('user_id', Auth::user()->id)->update([
                'phone' => $request->phoneNumber,
                'user_id' => 31,
                'edited_at' => Carbon::now('Europe/Warsaw'),
            ]);

            if ($savePhone === 1) {
                $result['success']['global'] = __('Edycja zakończona pomyślnie.');
            } else {
                $result['errors']['global'] = __('Ups! coś poszło nie tak.');
            }

        }

        return $result;

    }

    public function addPhoneNumber($request)
    {
        $result = [];

        $user_id = Auth::user()->id;

        $savePhone = Phone::create([
            'phone' => $request->phoneNumber,
            'user_id' => $user_id,
            'created_at' => Carbon::now('Europe/Warsaw'),
        ]);


        if ($savePhone) {
            $result['success']['global'] = __('Numer telefonu dodany pomyślnie.');
        } else {
            $result['errors']['global'] = __('Ups! coś poszło nie tak.');
        }

        return $result;
    }

    public function deletePhoneNumber($request)
    {

        $result = [];

        $phone = Phone::where('id', $request->phoneId)->where('user_id', Auth::user()->id)->firstOrFail();

        if ($phone == null) {

            $result['errors']['global'] = __('Wygląda na to, że nie znaleźliśmy tego numeru telefonu.');
        }

        if (!isset($result['errors'])) {
            $deletePhone = Phone::where('id', $request->phoneId)->where('user_id', Auth::user()->id)->delete();


            if ($deletePhone === 1) {
                $result['success']['global'] = __('Pomyślnie usunięto numer telefonu.');
            } else {
                $result['errors']['global'] = __('Ups! coś poszło nie tak.');
            }
        }

        return $result;

    }

    public function getCities()
    {
        return City::orderBy('name', 'asc')->get();
    }


    public function getCity($id)
    {
        return City::find($id);
    }


    public function createCity($request)
    {
        return City::create([
            'name' => $request->input('name'),
            'province_id' => 1,
        ]);
    }


    public function updateCity($request, $id)
    {
        return City::where('id', $id)->update([
            'name' => $request->input('name')
        ]);
    }


    public function deleteCity($id)
    {
        return City::where('id', $id)->delete();
    }
}

