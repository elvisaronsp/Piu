<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employeer;
use App\Address;
use App\BirthCertificate;
use App\EmployeerData;
use App\Http\Requests\EmployeerStoreRequest;
use App\User;
use App\GeneralRegistration;
use Auth;
use App\Http\Resources\EmployeerCollection;

class EmployeerController extends Controller
{

    public function index(Request $request){
      $school_id = Auth::user()->school_id;
      $employeers = Employeer::join('users', 'users.employeer_id', '=', 'employeers.id')
                             ->where('school_id', $school_id)
                             ->paginate(20);
      $resource = new EmployeerCollection($employeers);
      //return view('employeer.index')->with('employeers', $employeers);
      return $resource;
      //return $resource;
    }

    public function create(Request $request){
      return view('employeers.create');
    }

    public function store(EmployeerStoreRequest $request){
      $data = $request->validated();
      $address = Address::create($data);
      $birth_certificate = BirthCertificate::create($data);
      $general_registration = GeneralRegistration::create($data);
      $data['address_id'] = $address->id;
      $data['general_registration_id'] = $general_registration->id;
      $data['birth_certificate_id'] = $birth_certificate->id;
      $employer_data = EmployeerData::create($data);
      $data['employeer_data_id'] =  $employer_data->id;
      $employeer = Employeer::create($data);
      $data['employeer_id'] = $employeer->id;
      $data['school_id'] = Auth::user()->school_id;
      $data['password'] = bcrypt($data['password']);
      $user = User::create($data);
      return redirect('/home');
    }

}
