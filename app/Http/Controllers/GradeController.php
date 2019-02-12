<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Http\Requests\GradeStoreRequest;
use App\Http\Resources\Grade as GradeResource;
use App\Http\Resources\GradeCollection;
use App\StudentGroup;
use Auth;
use DB;
use App\Option;

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

	public function dataChart(Request $request, $group_id, $unit_id){
		$school_id = Auth::user()->school_id;
    $nota_minima = Option::where('name', 'student_grade_min')->first();
    if(!$nota_minima){
      $nota_minima = 5;
    }else{
      $nota_minima = $nota_minima->value;
    }
		$result = Grade::join('units', 'units.id', '=', 'grades.unit_id')
                    ->join('student_groups', 'student_groups.id', '=', 'grades.student_group_id')
                    ->join('students', 'students.id', '=', 'student_groups.student_id')
                    ->join('groups', 'groups.id', '=', 'student_groups.group_id')
                    ->join('stuffs', 'stuffs.id', '=', 'grades.stuff_id')
                    ->where([
                      ['groups.id', '=', $group_id],
                      //['units.id', '=', $unit_id]
                    ])
                    ->select(
                              'stuffs.title',
                              DB::raw("SUM(CASE WHEN grades.value < '{$nota_minima}' && units.id = {$unit_id} THEN 1 ELSE 0 END) AS reprovados"),
                              DB::raw("SUM(CASE WHEN grades.value >= '{$nota_minima}' && units.id = {$unit_id} THEN 1 ELSE 0 END) AS aprovados")
                            )
                    ->groupBy('stuffs.id')
                    ->get();
		return response($result, 200);
	}

}
