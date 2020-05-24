<?php

namespace App\Hipuppy\Gateways;


use App\Hipuppy\Interfaces\FrontendRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;


class FrontendGateway
{
    use ValidatesRequests;

    public function __construct(FrontendRepositoryInterface $fR)
    {
        $this->fR = $fR;
    }

    public function favouriteAnimal($request)
    {

        $validator = Validator::make($request->all(), [
            'animalId' => 'required|int',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->fR->favouriteAnimal($request);
    }

    public function notFavouriteAnimal($request)
    {

        $validator = Validator::make($request->all(), [
            'animalId' => 'required|int',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->fR->notFavouriteAnimal($request);
    }

    public function favouriteShelter($request)
    {
        $validator = Validator::make($request->all(), [
            'shelterId' => 'required|int',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->fR->favouriteShelter($request);
    }

    public function notFavouriteShelter($request)
    {
        $validator = Validator::make($request->all(), [
            'shelterId' => 'required|int',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->fR->notFavouriteShelter($request);
    }


    public function searchCities($request)
    {

        $cityName = $request->input('term');

        $results = array();

        $queries = $this->fR->getSearchCities($cityName);

        foreach ($queries as $query) {
            $results[] = ['id' => $query->id, 'value' => $query->name];
        }

        return $results;
    }

    public function joinShelterForm($request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
            'shelterName' => 'required|string|max:255',
            'shelterAddress' => 'nullable|string|max:255',
            'ShelterZipCode' => 'required|string|size:6',
            'shelterCity' => 'required|string|max:255',
            'ShelterTaxNumber' => 'required|string|max:14',
            'shelterRegonNumber' => 'required|string|max:14',
        ],
            [
                'name.required' => 'Pole "imie" jest wymagane',
                'name.string' => 'Pole "imie" musi być typu tekstowego',
                'name.max' => 'Pole "imie" nie może mieć więcej niż 255 znaków',

                'surname.required' => 'Pole "nazwisko" jest wymagane',
                'surname.string' => 'Pole "nazwisko" musi być typu tekstowego',
                'surname.max' => 'Pole "nazwisko" nie może mieć więcej niż 255 znaków',

                'email.required' => 'Pole "email" jest wymagane',
                'email.string' => 'Pole "email" musi być typu tekstowego',
                'email.email' => 'Pole "email" nie spełnia wymogów walidacji',
                'email.max' => 'Pole "email" nie może być dłuższe niż 255 znaków',

                'phone.required' => 'Pole "telefon" jest wymagane',
                'phone.numeric' => 'Pole "telefon" musi składać się z cyfr',

                'shelterName.required' => 'Pole "nazwa schroniska" jest wymagane',
                'shelterName.string' => 'Pole "nazwa schroniska" musi być typu tekstowego',
                'shelterName.max' => 'Pole "nazwa schroniska" nie może mieć więcej niż 255 znaków',

                'shelterAddress.string' => 'Pole "ulica" musi być typu tekstowego',
                'shelterAddress.max' => 'Pole "ulica" nie może mieć więcej niż 255 znaków',

                'ShelterZipCode.required' => 'Pole "kod pocztowy" jest wymagane',
                'ShelterZipCode.string' => 'Pole "kod pocztowy" musi być typu tekstowego',
                'ShelterZipCode.size' => 'Pole "kod pocztowy" musi mieć 6 znaków',

                'shelterCity.required' => 'Pole "miasto" jest wymagane',
                'shelterCity.string' => 'Pole "miasto" musi być typu tekstowego',
                'shelterCity.max' => 'Pole "miasto" nie może mieć więcej niż 255 znaków',

                'ShelterTaxNumber.required' => 'Pole "NIP" jest wymagane',
                'ShelterTaxNumber.string' => 'Pole "NIP" musi być typu tekstowego',
                'ShelterTaxNumber.max' => 'Pole "NIP" nie może mieć więcej niż 14 znaków',

                'shelterRegonNumber.required' => 'Pole "REGON" jest wymagane',
                'shelterRegonNumber.string' => 'Pole "REGON" musi być typu tekstowego',
                'shelterRegonNumber.max' => 'Pole "REGON" nie może mieć więcej niż 14 znaków',
            ]
        );

        $shelter_application = $this->fR->createShelterApplication($request);

        return $shelter_application;

    }

    public function sendReport($request)
    {

        $validator = Validator::make($request->all(), [
            'reportViolationReason' => 'required|string|max:50',
            'reportViolationText' => 'nullable|string|max:1000',
            'animalId' => 'required|integer'
        ],
            [
                'reportViolationReason.required' => 'Koniecznie zaznacz jeden z powodów zgłaszania narUps!coś poszło nie takuszenia.',
                'reportViolationReason.sting' => 'Zaznaczony powód powód musi być typu tekstowego.',
                'reportViolationReason.max' => 'Zaznaczony podów nie może mieć więcej niż 50 znaków.',
                'reportViolationText.string' => 'Pole "To zgłoszenie narusza..." musi być typu tekstowego.',
                'reportViolationText.max' => 'Pole "To zgłoszenie narusza..." nie może mieć więcej niż 1000 znaków.',
                'animalId.required' => 'Ups!coś poszło nie tak.',
                'animalId.integer' => 'Ups!coś poszło nie tak.',
            ]
        );


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        return $this->fR->sendReport($request);
    }
}

