<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employeer;
use App\Address;
use App\BirthCertificate;
use App\EmployeerData;
use App\Http\Requests\EmployeerStoreRequest;

class EmployeerController extends Controller
{

    public function index(Request $request){

    }

    public function create(Request $request){
      return view('employeer.create');
    }

    public function store(EmployeerStoreRequest $request){
      $data = $request->validated();
      $address = Address::create($data);
      $birth_certificate = BirthCertificate::create($data);
      $general_registration = GeneralRegistration::create($data);
      $employer_data = EmployeerData::create($data);
    }

}
