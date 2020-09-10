<?php


namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\{AcceptedRegulation, User, Role};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'accept_regulation' => 'required|accepted'
            ],
            [
                'name.required' => 'Pole "imię" jest wymagane.',
                'name.string' => 'Pole "imię" musi być typu tekstowego.',
                'name.max' => 'Pole "imię" nie może mieć więcej niż 255 znaków.',

                'surname.required' => 'Pole "nazwisko" jest wymagane.',
                'surname.string' => 'Pole "nazwisko" musi być typu tekstowego.',
                'surname.max' => 'Pole "nazwisko" nie może mieć więcej niż 255 znaków.',

                'email.required' => 'Pole "email" jest wymagane.',
                'email.string' => 'Pole "email" musi być typu tekstowego.',
                'email.max' => 'Pole "email" nie może mieć więcej niż 255 znaków.',
                'email.email' =>  'Pole "email" musi być poprawnym mailem.',

                'password.required' => 'Pole "hasło" jest wymagane.',
                'password.string' => 'Pole "hasło" musi być typu tekstowego.',
                'password.min' => 'Pole "hasło" nie może mieć mniej niż 6 znaków.',
                'password.confirmed' => 'Pole "hasło" musi być idenczne jak pole "powtórz hasło".',

                'accept_regulation.required' => 'Pole "akceptuje regulamin" jest wymagane.',
                'accept_regulation.accepted' => 'Pole "akceptuje regulamin" musi być zaakceptowane.',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();

        try {

            $user =  User::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

        } catch (ValidationException $e) {
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
            $user->acceptedRegulation()->save($acceptedRegulation);


        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors('message', 'Ups! Coś poszło nie tak. 1');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return $user;
    }
}
