<?php

namespace App\Hipuppy\Repositories;

use App\{Hipuppy\Interfaces\SheltersRepositoryInterface, Shelter};
use Illuminate\Support\Facades\DB;


class SheltersRepository implements SheltersRepositoryInterface
{

    public function getShelters()
    {
        $shelters = Shelter::with([
            'addressable',
            'addressable.city',
            'addressable.city.province',
            'photos',
        ])
            ->paginate(20);

        return $shelters;
    }

    public function searchShelters($request, $shelter)
    {

        if ($request->has('cityId')) {
            if ($request->input('cityId') == null) {


            }
        }


        $shelters = $shelter->newQuery();

        $shelters->with([
            'addressable',
            'addressable.city',
            'addressable.city.province',
            'photos',
        ]);

        if ($request->has('cityId')) {
            $shelters->whereHas('addressable', function ($query) use ($request) {
                $query->where('city_id', $request->input('cityId'));
            });
        }

        $shelters = $shelters->paginate(20)->appends([
            'cityName' => $request->input('cityName'),
            'cityId' => $request->input('cityId'),
        ]);


        if (isset($shelters[0]['addressable'][0]['city']['id'])) {

            if ($request->has('cityDistance')) {
                if ($request->input('cityDistance') > 0) {

                    $lat = $shelters[0]['addressable'][0]['city']['lat'];
                    $lon = $shelters[0]['addressable'][0]['city']['lon'];
                    $oneKilometer = 0.0117;

                    $minusLat = $lat - ($request->input('cityDistance') * $oneKilometer);
                    $plusLat = $lat + ($request->input('cityDistance') * $oneKilometer);

                    $minusLon = $lon - ($request->input('cityDistance') * $oneKilometer);
                    $plusLon = $lon + ($request->input('cityDistance') * $oneKilometer);


                    $shelterFromCities = DB::table('shelters')
                        ->leftJoin('addresses', 'shelters.id', '=', 'addresses.addressable_id')
                        ->leftJoin('cities', 'addresses.city_id', '=', 'cities.id')
                        ->where('addresses.addressable_type', 'like', '%Shelter%')
                        ->whereBetween('cities.lat', [$minusLat, $plusLat])
                        ->whereBetween('cities.lon', [$minusLon, $plusLon])
                        ->pluck('shelters.id');

                    if (!empty($shelterFromCities)) {
                        $sheltersWithDistance = $shelter->newQuery();

                        $sheltersWithDistance->with([
                            'addressable',
                            'addressable.city',
                            'addressable.city.province',
                            'photos',
                        ])
                            ->whereIn('id', $shelterFromCities);

                        $sheltersWithDistance = $sheltersWithDistance->paginate(20)->appends([
                            'cityName' => $request->input('cityName'),
                            'cityId' => $request->input('cityId'),
                        ]);
                        $shelters = $sheltersWithDistance;
                    }
                }
            }
        }


        return $shelters;

    }
}
