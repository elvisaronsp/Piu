<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentGroup;
use App\Http\Resources\StudentGroupCollection;
use App\Http\Resources\StudentGroup as StudentGroupResource;
use Auth;
use App\Http\Requests\StudentGroupStore;

class StudentGroupController extends Controller
{
    public function index(Request $request){
      $resource = $this->indexJson($request);
      return view('student_groups.index')->with('resource', $resource);
    }

    public function indexJson(Request $request){
      $user = Auth::user();
      $where = [
        ['schools.id', '=', $user->school_id]
      ];
      if($request->has('group_id')){
        $where[] = ['group_id', '=', $request->input('group_id')];
      }
      if($request->has('student_group_id')){
        $where[] = ['student_groups.id', '=', $request->input('student_group_id')];
      }
      $students = StudentGroup::join('groups', 'groups.id', '=', 'student_groups.group_id')
                              ->join('schools', 'schools.id', '=', 'groups.school_id')
                              ->where($where)
                              ->select('student_groups.*')
                              ->paginate(25);
      $resource = new StudentGroupCollection($students);
      return $resource;
    }

    public function store(StudentGroupStore $request){
      $data = $request->all();
      $studentGroup = StudentGroup::create($data);
      return new StudentGroupResource($studentGroup);
    }

}
