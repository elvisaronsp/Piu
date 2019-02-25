<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAbility($name){
      return Ability::where('name', $name)->firstOrFail();
    }

    public function getRoles(){
      return Role::all();
    }

    public function getRole($name){
      return Role::where('name', $name)->firstOrFail();
    }
}
