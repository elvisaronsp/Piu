<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\BirthCertificate;
use App\Address;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Resources\StudentCollection;
use Auth;
use Flash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $group_id = $request->input('group_id');
        $student_name = $request->input('student_name');
        //$student_group_id = $request->input('student_group_id');
        $school_id = Auth::user()->school_id;
        $where  = [
          ['students.school_id', '=', $school_id]
        ];
        if($student_name){
          $where[] = ['students.name', 'like', '%'.$student_name.'%'];
        }
        $students = null;
        if($group_id){
          $where[] = ['student_groups.group_id', '=', $group_id];
          $students = Student::join('student_groups', 'students.id', '=', 'student_groups.student_id')
                              ->where($where)
                              ->paginate(10);
        }else{
          $students = Student::where($where)
                              ->paginate(10);
        }
        $resource = new StudentCollection($students);
        return $resource;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        $data = $request->validated();
        $address = Address::create($data);
        $data['address_id'] = $address->id;
        $birth = BirthCertificate::create($data);
        $data['birth_certificate_id'] = $address->id;
        $data['school_id'] = Auth::user()->school_id;
        $student = Student::create($data);
        Flash::success('Estudante cadastrado com sucesso! Não esqueça de matriculá-lo em uma turma.');
        return redirect('/students/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return view('student.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        // TODO: update address, birth_certificate and most attributes
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        Flash::success('Estudante apagado com sucesso!');
        return redirect('/');
    }

    public function report_card(Request $request, $id){
        $student = Student::findOrFail($id);
        return view('students.report_card')->with('student', $student);
    }
}
