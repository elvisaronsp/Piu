<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\School;
use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Storage;

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
        return Validator::make($data, array_merge(
            //User
            User::$rules,
            //Address
            Address::$rules,
            //School
            School::$rules
            //
        ));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $logo = Storage::putFile('logos', $data['logo']);
        $logo_city = Storage::putFile('logos_cities', $data['logo_city']);
        $address = Address::create($data);

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
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'school_id' => $school->id
        ]);

        return $user;
    }
}
