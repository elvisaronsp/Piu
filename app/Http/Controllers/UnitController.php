<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Http\Resources\UnitCollection;
use Auth;

class UnitController extends Controller
{

    public function index(Request $request){
        $school_id = '';
        if(Auth::check()){
            $school_id = Auth::user()->school_id;
        }else{
            $request->input('school_id');
        }
        $where = [
            ['school_id', '=', $school_id]
        ];
        $result = Unit::where($where)->orWhere('school_id', null)->get();
        return new UnitCollection($result);
    }

    public function destroy(Request $request, $id){
      $unit = Unit::findOrFail($id);
      $unit->delete();
      Flash::success('Unidade apagada com sucesso!');
      return redirect('/');
    }

}
