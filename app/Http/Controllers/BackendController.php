<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hipuppy\Interfaces\BackendRepositoryInterface;
use App\Hipuppy\Gateways\BackendGateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Events\ReservationConfirmedEvent;


class BackendController extends Controller
{
    public function __construct(BackendGateway $backendGateway, BackendRepositoryInterface $backendRepository)
    {

        $this->middleware('CheckOwner')->only(['confirmReservation','saveRoom','saveObject','myObjects' ]);

        $this->bG = $backendGateway;
        $this->bR = $backendRepository;
    }


    public function index(Request $request )
    {
        return view('backend.index');
    }

    public function favourite(){

        $favourite = $this->bR->getFavourite();

        return view('backend.favourites', ['favourite'=>$favourite]);

    }

    public function savePhoneNumber(Request $request){

        $savePhoneNumber = $this->bG->savePhoneNumber($request);

        return response()->json($savePhoneNumber);
    }

    public function deletePhoneNumber(Request $request){

        $deletePhoneNumber = $this->bG->deletePhoneNumber($request);

        return response()->json($deletePhoneNumber);

    }


    public function profile(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $user = $this->bG->saveUser($request);

            if ($request->hasFile('userPicture'))
            {
                $path = $request->file('userPicture')->store('users', 'public');

                if (count($user->photos) != 0)
                {
                    $photo = $this->bR->getPhoto($user->photos->first()->id);

                    Storage::disk('public')->delete($photo->storagepath);
                    $photo->path = $path;

                    $this->bR->updateUserPhoto($user,$photo);
                }
                else
                {
                    $this->bR->createUserPhoto($user,$path);
                }
            }
            return redirect()->back();
        }

        $userData = $this->bR->userData();


        return view('backend.profile',['user'=>$userData]);
    }


    public function deletePhoto($id)
    {

        $photo = $this->bR->getPhoto($id);

        $this->authorize('checkOwner', $photo);

        $path = $this->bR->deletePhoto($photo);

        Storage::disk('public')->delete($path);

        return redirect()->back();
    }

    public function getUserPhones(){

        $userPhones = $this->bR->getUserPhones();

        return $userPhones;

    }
}
