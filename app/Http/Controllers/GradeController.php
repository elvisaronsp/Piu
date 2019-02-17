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
use Flash;

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

  public function destroy(Request $request, $id){
    $grade = Grade::findOrFail($id);
    $grade->delete();
    Flash::success('Nota apagada com sucesso!');
    return redirect('/');
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

  public function dataAta(Request $request, $group_id){
    try{
      $grades = StudentGroup::where('group_id', $group_id)->with(
        ['grades' => function($query){
          $query->select('id', DB::raw('SUM(grades.value) as nota_total'),
          'student_group_id', 'stuff_id')->groupBy('stuff_id');
        }, 'grades.stuff:id,title', 'student:id,name,genre'])
        ->get();
        return response($grades, 200);
    }catch(\Exception $e){
        return response($e, 500);
    }
  }

  public function dataBoletim(Request $request, $student_group_id){
    $grades = StudentGroup::where('id', $student_group_id)
                          ->with([
                            'group:id,title,school_id',
                            'group.school:id,name,address_id,logo,city_logo',
                            'group.school.address',
                            'group.stuffs:id,title,group_id',
                            'group.stuffs.grades' => function($query)use($student_group_id){
                              $query->select('id', 'value', 'stuff_id', 'unit_id')
                                    ->where('student_group_id', $student_group_id)
                                    ->groupBy('unit_id');
                            },
                            'group.stuffs.grades.unit:id,title'
                          ])->first();
    return response($grades, 200);
  }

  # Dá acesso ao estudante através de CPF consultar a sua nota
  public function studentBoletim(Request $request){
    return view('grades.student_boletim');
  }

}
