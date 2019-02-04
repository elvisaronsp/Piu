<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Http\Requests\GradeStoreRequest;
use App\Http\Resources\Grade as GradeResource;
use App\Http\Resources\GradeCollection;
use App\StudentGroup;

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
		$grades = Grade::join('student_groups', 'student_groups.id', '=', 'grades.student_group_id')
			  ->join('groups', 'student_groups.group_id', '=', 'groups.id')
			  ->join('employeers', 'employeers.id', '=', 'student_groups.employeer_id')
			  ->where($where)
			  ->select(['grades.*'])
			  ->get();
        return new GradeCollection($grades);
    }

    public function store(GradeStoreRequest $request){
        $data = $request->json();
        $data['employeer_id'] = Auth::user()->employeer_id;
        $studentGroup = StudentGroup::where([
                                        ['enabled', '=', true],
                                        ['student_id', '=', $data['student_id']],
                                        ['group_id', '=', $data['group_id']]
                                    ])->firstOrFail();
        $data['student_group_id'] = $studentGroup->id;
        $result = Grade::create($data);
        return new GradeResource($result);
    }

}
