<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hipuppy\Gateways\BackendGateway;
use App\Hipuppy\Interfaces\BackendRepositoryInterface;


class CityController extends Controller
{


    public function __construct(BackendGateway $backendGateway, BackendRepositoryInterface $backendRepository)
    {
        $this->middleware('CheckAdmin');
        $this->bG = $backendGateway;
        $this->bR = $backendRepository;
    }



    public function index()
    {
        return view('backend.cities.index',['cities'=>$this->bR->getCities()]);
    }


    public function create()
    {
        return view('backend.cities.create');
    }


    public function store(Request $request)
    {
        $this->bG->createCity($request);
        return redirect()->route('cities.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('backend.cities.edit',['city'=>$this->bR->getCity($id)]);
    }


    public function update(Request $request, $id)
    {
        $this->bG->updateCity($request, $id);
        return redirect()->route('cities.index');
    }


    public function destroy($id)
    {
        $this->bR->deleteCity($id);
        return redirect()->route('cities.index');
    }
}
