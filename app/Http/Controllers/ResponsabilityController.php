<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsability;
use App\Http\Resources\Responsabilities as ResponsabilityResource;
use Auth;

class ResponsabilityController extends Controller
{
    public function index(Request $request){
      $school_id = Auth::user()->school_id;
      $responsabilities =  Responsability::whereNull('school_id')->orWhere('school_id', $school_id)->get();
      return response()->json($responsabilities);
    }
}
