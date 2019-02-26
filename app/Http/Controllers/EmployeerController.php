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
use Flash;

class EmployeerController extends Controller
{

    public function index(Request $request){
      $school_id = Auth::user()->school_id;
      $employeers = Employeer::join('users', 'users.employeer_id', '=', 'employeers.id')
                             ->where('school_id', $school_id)
                             ->paginate(20);
      $resource = new EmployeerCollection($employeers);
      return $resource;
    }

    public function create(Request $request){
      $roles = $this->getRoles();
      return view('employeers.create')->with('roles', $roles);
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
      $user->assign($data['role']);
      Flash::success('Funcionário criado com sucesso!');
      return redirect('/');
    }

    public function destroy(Request $request, $id){
      $employeer = Employeer::findOrFail($id);
      $employeer->delete();
      Flash::success('Funcionário apagado com sucesso!');
      return redirect('/');
    }

}
