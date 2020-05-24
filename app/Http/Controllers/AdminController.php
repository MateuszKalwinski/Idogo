<?php


namespace App\Http\Controllers;

use App\Hipuppy\Gateways\AdminGateway;
use App\Hipuppy\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(AdminGateway $adminGateway, AdminRepositoryInterface $adminRepository)
    {
        $this->middleware('CheckAdmin');
        $this->aG = $adminGateway;
        $this->aR = $adminRepository;
    }

    public function adminUsers()
    {

        if (request()->ajax()) {

            $datatable = $this->aR->adminUsers();

            return $datatable;
        }

        return view('backend.users.index');
    }

    public function adminShelterApplication()
    {
        if (request()->ajax()) {

            $datatable = $this->aR->adminShelterApplication();

            return $datatable;
        }

        return view('backend.shelterApplication.index');
    }

    public function adminSpecies()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminSpecies();

            return $datatable;
        }

        return view('backend.species.index');
    }

    public function adminStoreAnimalSpecies(Request $request)
    {
        $storeAnimalSpecies = $this->aG->storeAnimalSpecies($request);

        return $storeAnimalSpecies;
    }

    public function adminUpdateAnimalSpecies(Request $request)
    {
        $updateAnimalSpecies = $this->aG->updateAnimalSpecies($request);

        return $updateAnimalSpecies;
    }

    public function deleteAnimalSpecies(Request $request){
        $deleteAnimalSpecies = $this->aG->deleteAnimalSpecies($request);

        return $deleteAnimalSpecies;
    }


    public function adminSpeciesWithGender()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminSpeciesWithGender();

            return $datatable;
        }

        return view('backend.species.index');
    }

    public function adminBreeds()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminBreeds();

            return $datatable;
        }

        return view('backend.breeds.index');
    }

    public function adminAnimals()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminAnimals();

            return $datatable;
        }

        return view('backend.animals.index');
    }

    public function adminAnimalCharacteristics()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminAnimalCharacteristics();

            return $datatable;
        }

        return view('backend.animalCharacteristics.index');
    }

    public function adminStoreAnimalCharacteristic(Request $request)
    {
        $storeAnimalCharacteristic = $this->aG->storeAnimalCharacteristic($request);

        return $storeAnimalCharacteristic;
    }

    public function adminUpdateAnimalCharacteristic(Request $request)
    {
        $updateAnimalCharacteristic = $this->aG->updateAnimalCharacteristic($request);

        return $updateAnimalCharacteristic;
    }

    public function deleteAnimalCharacteristic(Request $request)
    {
        $deleteAnimalCharacteristic = $this->aG->deleteAnimalCharacteristic($request);

        return $deleteAnimalCharacteristic;
    }


    public function adminAnimalColors()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminAnimalColors();

            return $datatable;
        }

        return view('backend.animalColors.index');
    }

    public function adminStoreAnimalColor(Request $request)
    {
        $storeAnimalColor = $this->aG->storeAnimalColor($request);

        return $storeAnimalColor;
    }

    public function adminUpdateAnimalColor(Request $request)
    {
        $updateAnimalColor = $this->aG->updateAnimalColor($request);

        return $updateAnimalColor;
    }

    public function deleteAnimalColor(Request $request)
    {
        $deleteAnimalColor = $this->aG->deleteAnimalColor($request);

        return $deleteAnimalColor;
    }

    public function adminViolationReports()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminViolationReports();

            return $datatable;
        }

        return view('backend.violationReports.index');
    }

}
