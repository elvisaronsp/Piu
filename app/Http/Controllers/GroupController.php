<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GroupCollection;
use Auth;
use App\Group;
use App\Http\Requests\GroupStoreRequest;

class GroupController extends Controller
{

    public function index(Request $request){
      $s = $request->input('s');
      $user = Auth::user();
      $classes = Group::where([
                                ['school_id', '=', $user->id],
                                ['title', 'like', '%'.$s.'%'],
                              ])->paginate(10);
      $resource = new GroupCollection($classes);
      return $resource;
    }

    public function create(Request $request){
      return view('groups.create');
    }

    public function store(GroupStoreRequest $request){
      $data = $request->validated();
      $data['school_id'] = Auth::user()->school_id;
      Group::create($data);
      return redirect('/');
    }

    public function destroy(Request $request, $id){
      $group = Group::findOrFail($id);
      $group->delete();
      return response('Turma apagada com sucesso!', 200);
    }

}
