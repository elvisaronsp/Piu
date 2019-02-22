<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class AddressController extends Controller
{

    public function index(Request $request, $id){
      $address = Address::findOrFail($id);
      return response($address, 200);
    }

}
