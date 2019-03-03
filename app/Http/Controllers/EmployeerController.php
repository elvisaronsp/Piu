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
                             ->select('employeers.*')
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

    public function edit(Request $request, $id){
      $employeer = Employeer::findOrFail($id);
      if(!$this->isOurEmployeer($employeer)){
        return view('errors.401', 401);
      }
      $roles = $this->getRoles();
      return view('employeers.edit')->with('roles', $roles)->with('employeer', $employeer);
    }

    public function update(Request $request){
      $data = $request->all();
      $employeer = Employeer::findOrFail($data['employeer_id']);
      if(!$this->isOurEmployeer($employeer)){
        return view('errors.401', 401);
      }
      $employeer->employeer_data->update($data);
      $employeer->general_registration->update($data);
      $employeer->address->update($data);
      $employeer->birth_certificate->update($data);
      Flash::success("Funcionário {$employeer->employeer_data->name} atualizado com sucesso!");
      return redirect()->back();
    }

    private function isOurEmployeer($employeer){
      return $employeer->user->school_id == Auth::user()->school_id;
    }

}
