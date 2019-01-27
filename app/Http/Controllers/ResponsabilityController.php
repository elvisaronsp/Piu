<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsability;
use App\Http\Resources\Responsabilities as ResponsabilityResource;
use Auth;

class ResponsabilityController extends Controller
{
    public function get(Request $request){
      $responsabilities =  Responsability::whereNull('school_id')->get();
      return response()->json($responsabilities);
    }
}
