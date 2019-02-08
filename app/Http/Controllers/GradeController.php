<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Http\Requests\GradeStoreRequest;
use App\Http\Resources\Grade as GradeResource;
use App\Http\Resources\GradeCollection;
use App\StudentGroup;
use Auth;

class GradeController extends Controller
{

    public function index(Request $request){
    	$where = [];
    	if($request->has('student_id')){
    		$where[] = ['student_groups.student_id', '=', $request->input('student_id')];
    	}
    	if($request->has('group_id')){
    		$where[] = ['groups.id', '=', $request->input('group_id')];
    	}
      if($request->has('student_group_id')){
    		$where[] = ['student_groups.id', '=', $request->input('student_group_id')];
    	}
	    $grades = Grade::join('student_groups', 'student_groups.id', '=', 'grades.student_group_id')
                		  ->join('groups', 'student_groups.group_id', '=', 'groups.id')
                		  ->where($where)
                		  ->select(['grades.*'])
                		  ->get();
      return new GradeCollection($grades);
    }

    public function store(GradeStoreRequest $request){
        $data = $request->all();
        $data['employeer_id'] = Auth::user()->employeer_id;
        $studentGroup = StudentGroup::findOrFail($data['student_group_id']);
        $data['student_group_id'] = $studentGroup->id;
        $result = Grade::create($data);
        return new GradeResource($result);
	}
	
	public function dataChart(Request $request, $student_group_id){
		$school_id = Auth::user()->school_id;
		$result = Grade::where('student_group_id', $student_group_id)
					   ->get();
		return response($result, 200);
	}

}
