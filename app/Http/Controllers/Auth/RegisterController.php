<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\School;
use App\Addreess;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

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
            //User
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            //Address
            'street' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'cod_postal' => ['required'],
            'number' => ['required'],
            'complement' => '',
            //School
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'act_creation' => ['required'],
            'act_creation_date' => ['required'],
            'direc_number' => ['required'],
            'logo' => ['required'],
            'logo_city' => ['required'],
            'address_id' => ['required']
            //
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $logo = $data['logo']->file('logo')->store('logos');
        $logo_city = $data['logo_city']->file('logo_city')->store('logos_cities');
        $address = Address::create([
          'street' => $data['street'],
          'state' => $data['state'],
          'city' => $data['city'],
          'cod_postal' => $data['cod_postal'],
          'number' => $data['number'],
          'complement' => $data['complement'],
        ]);

        $school = School::create([
          'name' => $data['name'],
          'code' => $data['code'],
          'act_creation' => $data['act_creation'],
          'act_creation_date' => $data['act_creation_date'],
          'direc_number' => $data['direc_number'],
          'logo' => $logo,
          'logo_city' => $logo_city,
          'address_id' => $address->id
        ]);
        $user = User::create([
            //'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'school_id' => $school->id
        ]);

        return $user;
    }
}
