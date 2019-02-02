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
      $where = ['group_id', 'like', '%%'];
      if($group_id = $request->input('group_id')){
        $where = ['group_id', '=', $group_id];
      }
      $user = Auth::user();
      $students = StudentGroup::join('groups', 'groups.id', '=', 'student_groups.group_id')
                              ->join('schools', 'schools.id', '=', 'groups.school_id')
                              ->where([
                                  ['schools.id', '=', $user->school_id],
                                  $where
                              ])
                              ->select('student_groups.*')
                              ->paginate(25);
      $resource = new StudentGroupCollection($students);
      return view('student_groups.index')->with('resource', $resource);
    }

    public function store(StudentGroupStore $request){
      $data = $request->all();
      $studentGroup = StudentGroup::create($data);
      return new StudentGroupResource($studentGroup);
    }

}
