<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use Auth;
use App\Http\Resources\OptionCollection;
use App\Http\Requests\OptionStoreRequest;

class OptionController extends Controller
{
  
    public function index(Request $request){
      $school_id = Auth::user()->school_id;
      $options = Option::where('school_id', $school_id)->paginate(10);
      return new OptionCollection($options);
    }
  
    public function store(OptionStoreRequest $request){
      $data = $request->validated();
      $data['school_id'] = Auth::user()->school_id;
      return redirect('/')->with('status', 'Opção criado com sucesso!');
    }
  
}
