<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentGroup;
use App\Http\Resources\StudentGroupCollection;
use App\Http\Resources\StudentGroup;
use Auth;

class StudentGroupController extends Controller
{
    public function index(Request $request){
      $user = Auth::user();
      $students = StudentGroup::join('groups', 'groups.id', '=', 'student_groups.group_id')
                              ->join('schools', 'schools.id', '=', 'groups.school_id')
                              ->where('schools.id', $user->school_id)
                              ->select('student_groups.*')
                              ->paginate(25);
      $resource = new StudentGroupCollection($students);
      return $resource;
    }

    public function store(Request $request){
      $data = $request->all();
      $studentGroup = StudentGroup::create($group);
      return new StudentGroup($studentGroup);
    }

}
