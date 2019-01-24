<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsability;
use App\Http\Resources\Responsability as ResponsabilityResource;

class ResponsabilityController extends Controller
{
    public function get(Request $request){
      $responsabilities =  ResponsabilityResource::collection(
                                Responsability::where('school_id', Auth::user()->school_id)->orWhere('school_id', NULL)
                              );
      return response()->json($responsabilities);
    }
}
