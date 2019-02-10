<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use Auth;
use App\Http\Resources\OptionCollection;
use App\Http\Requests\OptionStoreRequest;
use Flash;

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
      if($option = Option::create($data)){
        Flash::success("Opção {$data['name']} criada com sucesso");
      }else{
        Flash::error("Opção {$data['name']} não foi criada. Um erro ocorreu.");
      }
      return redirect('/');
    }

    public function create(Request $request){
      return view('options.create');
    }

}
