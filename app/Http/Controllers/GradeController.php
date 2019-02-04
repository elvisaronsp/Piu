<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Http\Requests\GradeStoreRequest;

class GradeController extends Controller
{

    public function index(Request $request){
    	$where = []
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
    }

    public function store(GradeStoreRequest $request){

    }

}
