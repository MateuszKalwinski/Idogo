<?php


namespace App\Http\Controllers;

use App\Hipuppy\Gateways\AdminGateway;
use App\Hipuppy\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    use \App\Hipuppy\Traits\AdminAjax;

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

    public function deleteAnimalSpecies(Request $request)
    {
        $deleteAnimalSpecies = $this->aG->deleteAnimalSpecies($request);

        return $deleteAnimalSpecies;
    }

    public function restoreAnimalSpecies(Request $request)
    {
        $restoreAnimalSpecies = $this->aG->restoreAnimalSpecies($request);

        return $restoreAnimalSpecies;
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

    public function restoreAnimalCharacteristic(Request $request)
    {

        $restoreAnimalCharacteristic = $this->aG->restoreAnimalCharacteristic($request);

        return $restoreAnimalCharacteristic;
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

    public function restoreAnimalColor(Request $request)
    {
        $restoreAnimalColor = $this->aG->restoreAnimalColor($request);

        return $restoreAnimalColor;
    }

    public function getAvailableDataForBreed(Request $request)
    {
        $getAvailableDataForBreed = $this->aG->getAvailableDataForBreed($request);

        return $getAvailableDataForBreed;
    }

    public function adminAvailableColors()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminAvailableColors();

            return $datatable;
        }

        return view('backend.availableColors.index');
    }

    public function adminStoreAvailableColors(Request $request)
    {
        $storeAvailableColors = $this->aG->storeUpdateAvailableColor($request);

        return $storeAvailableColors;
    }

    public function adminUpdateAvailAbleColors(Request $request)
    {
        $updateAvailableColors = $this->aG->storeUpdateAvailableColor($request);

        return $updateAvailableColors;
    }

    public function deleteAvailableColor(Request $request)
    {
        $deleteAvailableColor = $this->aG->deleteAvailableColor($request);

        return $deleteAvailableColor;
    }

    public function adminAvailableFurs()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminAvailableFurs();

            return $datatable;
        }

        return view('backend.availableFurs.index');
    }

    public function adminStoreAvailableFurs(Request $request)
    {
        $storeAvailableFurs = $this->aG->storeUpdateAvailableFur($request);

        return $storeAvailableFurs;
    }

    public function adminUpdateAvailAbleFurs(Request $request)
    {
        $updateAvailableFurs = $this->aG->storeUpdateAvailableFur($request);

        return $updateAvailableFurs;
    }


    public function deleteAvailableFur(Request $request)
    {
        $deleteAvailableFur = $this->aG->deleteAvailableFur($request);

        return $deleteAvailableFur;
    }

    public function adminAvailableCharacteristicDictionary()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminAvailableCharacteristicDictionary();

            return $datatable;
        }

        return view('backend.availableCharacteristicDictionary.index');
    }

    public function adminViolationReports()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminViolationReports();

            return $datatable;
        }

        return view('backend.violationReports.index');
    }

    public function adminAnimalFur()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminAnimalFur();

            return $datatable;
        }

        return view('backend.animalFur.index');
    }

    public function adminStoreAnimalFur(Request $request)
    {
        $storeAnimalFur = $this->aG->storeAnimalFur($request);

        return $storeAnimalFur;
    }

    public function adminUpdateAnimalFur(Request $request)
    {
        $updateAnimalFur = $this->aG->updateAnimalFur($request);

        return $updateAnimalFur;
    }

    public function deleteRestoreAnimalFur(Request $request)
    {
        $deleteRestoreAnimalFur = $this->aG->deleteRestoreAnimalFur($request);

        return $deleteRestoreAnimalFur;
    }

    public function adminAnimalSize()
    {
        if (request()->ajax()) {
            $datatable = $this->aR->adminAnimalSize();

            return $datatable;
        }

        return view('backend.animalSize.index');
    }

    public function adminStoreAnimalSize(Request $request)
    {
        $storeAnimalSize = $this->aG->storeAnimalSize($request);

        return $storeAnimalSize;
    }

    public function adminUpdateAnimalSize(Request $request)
    {
        $updateAnimalSize = $this->aG->updateAnimalSize($request);

        return $updateAnimalSize;
    }

    public function deleteAnimalSize(Request $request)
    {
        $deleteAnimalSize = $this->aG->deleteAnimalSize($request);

        return $deleteAnimalSize;
    }

    public function restoreAnimalSize(Request $request)
    {
        $restoreAnimalSize = $this->aG->restoreAnimalSize($request);

        return $restoreAnimalSize;
    }

}
