<?php

namespace App\Hipuppy\Gateways;

use App\Hipuppy\Interfaces\BackendRepositoryInterface;
use App\Photo;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Memcached;


class BackendGateway
{

    use ValidatesRequests;


    public function __construct(BackendRepositoryInterface $bR)
    {
        $this->bR = $bR;
    }



    public function createCity($request)
    {
        $this->validate($request, [
            'name' => "required|string|unique:cities",
        ]);

        $this->bR->createCity($request);
    }


    public function updateCity($request, $id)
    {
        $this->validate($request, [
            'name' => "required|string|unique:cities",
        ]);

        $this->bR->updateCity($request, $id);
    }


    public function saveUser($request)
    {
        $this->validate($request, [
            'name' => "required|string|max:255",
            'surname' => "required|string|max:255",
        ],
            [
                'name.required' => 'Pole "imie" jest wymagane',
                'name.string' => 'Pole "imie" musi być typu tekstowego',
                'name.max' => 'Pole "imie" nie może mieć więcej niż 255 znaków',

                'surname.required' => 'Pole "nazwisko" jest wymagane',
                'surname.string' => 'Pole "nazwisko" musi być typu tekstowego',
                'surname.max' => 'Pole "nazwisko" nie może mieć więcej niż 255 znaków',
            ]
        );

        if ($request->hasFile('userPicture')) {
            $this->validate($request, [
                'userPicture' => "image|max:2000",

            ],
                [
                    'userPicture.image' => 'Pole "zdjęcie profilowe" musi być mieć rozszerzenie jpg, jpeg lub png.',
                    'userPicture.max' => 'Maksymalny rozmiar zdjęcia to 2MB.',
                ]);
        }

        return $this->bR->saveUser($request);
    }

    public function savePhoneNumber($request)
    {
        $validator = Validator::make($request->all(), [
            'phoneId' => "nullable|integer",
            'phoneNumber' => "required|numeric",
        ],
            [
                'phoneId.integer' => 'Ups!coś poszło nie tak',

                'phoneNumber.required' => 'Pole "telefon" jest wymagane',
                'phoneNumber.numeric' => 'Pole "telefon" musi składać się z cyfr',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->has('phoneId') && $request->phoneId !== null) {
            return $this->bR->editPhoneNumber($request);
        } else {
            return $this->bR->addPhoneNumber($request);
        }

    }

    public function deletePhoneNumber($request)
    {
        $validator = Validator::make($request->all(), [
            'phoneId' => "required|integer",
        ],
            [
                'phoneId.required' => 'Ups!coś poszło nie tak',
                'phoneId.integer' => 'Ups!coś poszło nie tak',
            ]
        );


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }


        return $this->bR->deletePhoneNumber($request);

    }
}

