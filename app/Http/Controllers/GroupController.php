<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GroupCollection;
use Auth;
use App\Group;
use App\Http\Requests\GroupStoreRequest;
use Flash;

class GroupController extends Controller
{

    public function index(Request $request){
      $school_id = null;
      $s = $request->input('s');
      if($request->has('school_id')){
        $school_id = $request->input('school_id');
      }else{
        if(Auth::check()){
          $user = Auth::user();
          $school_id = $user->id;
        }else{
          return response('Unauthorized', 401);
        }
      }
      $classes = Group::where([
                                ['school_id', '=', $school_id],
                                ['title', 'like', '%'.$s.'%'],
                              ]);
      if($request->has('school_id')){
        $classes = $classes->paginate(10);
      }
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
      Flash::success("Turma {$data['title']} criada com sucesso!");
      return redirect('/');
    }

    public function destroy(Request $request, $id){
      $group = Group::findOrFail($id);
      Flash::success("Turma {$group->title} apagada com sucesso!");
      $group->delete();
      return redirect('/');
    }

    public function ata(Request $request, $id){
      $school_id = Auth::user()->school_id;
      $group = Group::where([
                  ['id', '=', $id],
                  ['school_id', '=', $school_id]
                ])->with('school')->first();
      return view('groups.ata')->with('group', $group);
    }

}
