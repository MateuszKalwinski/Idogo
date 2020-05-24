<?php

namespace App\Http\Controllers;

use App\Events\OrderPlacedEvent;
use App\Hipuppy\Gateways\FrontendGateway;
use App\Hipuppy\Interfaces\FrontendRepositoryInterface;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function __construct(FrontendRepositoryInterface $frontendRepository, FrontendGateway $frontendGateway)
    {

        $this->middleware('auth')->only(['favourite']);

        $this->fR = $frontendRepository;
        $this->fG = $frontendGateway;
    }

    public function index()
    {
        $animals = $this->fR->getAnimalForMainPage(9);
        $shelters = $this->fR->getSheltersForMainPage(9);
        $counters = $this->fR->getCounter();

        return view('frontend.index', [
            'animals' => $animals,
            'shelters' => $shelters,
            'counters' => $counters,
        ]);
    }

    public function getPhoneNumbers(Request $request)
    {

        $results = $this->fR->getPhoneNumbers($request);

        return response()->json($results);
    }

    public function getAnimalSpecies(Request $request)
    {

        $species = $this->fR->getAnimalSpecies();

        return response()->json($species);

    }

    public function favouriteAnimal(Request $request)
    {
        $favouriteAnimal = $this->fG->favouriteAnimal($request);

        return response()->json($favouriteAnimal);
    }

    public function notFavouriteAnimal(Request $request)
    {

        $notFavouriteAnimal = $this->fG->notFavouriteAnimal($request);

        return response()->json($notFavouriteAnimal);
    }

    public function favouriteShelter(Request $request)
    {

        $favouriteShelter = $this->fG->favouriteShelter($request);

        return response()->json($favouriteShelter);
    }

    public function notFavouriteShelter(Request $request)
    {

        $notFavouriteShelter = $this->fG->notFavouriteShelter($request);

        return response()->json($notFavouriteShelter);

    }

    public function searchCities(Request $request)
    {
        $results = $this->fG->searchCities($request);

        return response()->json($results);
    }

    public function user(int $id)
    {

        $user = $this->fR->getUser($id);
        $animalsForUser = $this->fR->getAnimalForUser($id);

        return view('frontend.user', ['user' => $user, 'animalsForUser' => $animalsForUser]);
    }

    public function joinShelter()
    {
        return view('frontend.joinShelter', []);
    }

    public function joinShelterForm(Request $request)
    {
        $this->fG->joinShelterForm($request);

        return redirect()->back()->with('message', 'Przyjeliśmy Twój formularz. Dziękujemy! Nasz zespół przystąpi teraz
         do weryfikacji zgłoszenia. Poinformujemy Cię o wyniku weryfikacji drogą mailową. Jeśli wynik weryfikacji będzie pozytywny otrzymasz maila z dostąpem do schroniska.');
    }

    public function sendReport(Request $request)
    {

        $sendReport = $this->fG->sendReport($request);

        return response()->json($sendReport);
    }

}
