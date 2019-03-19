<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentGroup;
use App\Http\Resources\StudentGroupCollection;
use App\Http\Resources\StudentGroup as StudentGroupResource;
use Auth;
use App\Http\Requests\StudentGroupStore;
use App\Student;

class StudentGroupController extends Controller
{
    public function index(Request $request){
      $resource = $this->indexJson($request);
      return view('student_groups.index')->with('resource', $resource);
    }

    public function indexJson(Request $request){
      $where = [];
      if(Auth::check()){
        $user = Auth::user();
        $where = [
          ['schools.id', '=', $user->school_id]
        ];
      }else{
        if($request->has('school_id')){
          $where = [
            ['schools.id', '=', $request->input('school_id')]
          ];
        }else {
          return response('Unauthorized', 401);
        }
      }
      if($request->has('group_id')){
        $where[] = ['group_id', '=', $request->input('group_id')];
      }
      if($request->has('student_id')){
        $where[] = ['student_id', '=', $request->input('student_id')];
      }
      if($request->has('cpf')){
        $where[] = ['general_registrations.cpf', '=', $request->input('cpf')];
      }
      if($request->has('student_group_id')){
        $where[] = ['student_groups.id', '=', $request->input('student_group_id')];
      }
      $students = StudentGroup::join('groups', 'groups.id', '=', 'student_groups.group_id')
                              ->join('students', 'students.id', '=', 'student_groups.student_id')
                              ->join('general_registrations', 'general_registrations.id', '=', 'students.general_registration_id')
                              ->join('schools', 'schools.id', '=', 'groups.school_id')
                              ->where($where)
                              ->select('student_groups.*')
                              ->paginate(25);
      $resource = new StudentGroupCollection($students);
      return response($resource, 200);
    }

    public function store(StudentGroupStore $request){
      $data = $request->all();
      $studentGroup = StudentGroup::where([
                        ['group_id', '=', $data['group_id']],
                        ['student_id', '=', $data['student_id']],
                        ['enabled', '=', true]
                      ])->first();
      if(!$studentGroup){
        $studentGroup = StudentGroup::create($data);
        if($studentGroup){
          $student = Student::findOrFail($studentGroup->student_id);
          $student->status = 'registered';
          $student->save();
        }
        return new StudentGroupResource($studentGroup);
      }
      return response('Aluno já matriculado nesta turma', 406);
    }

    public function destroy(Request $request, $id){
      $studentGroup = StudentGroup::findOrFail($id);
      $student = Student::findOrFail($studentGroup->student_id);
      $student->status = 'idle';
      $student->save();
      $studentGroup->delete();
      Flash::success('Aluno desmatriculado com sucesso!');
      return redirect('/');
    }

    public function boletim(Request $request, $student_group_id){
      return view('student_groups.boletim')->with('student_group_id', $student_group_id);
    }

}
