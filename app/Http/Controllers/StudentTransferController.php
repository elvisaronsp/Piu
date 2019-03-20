<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentTransfer;
use App\Student;
use Auth;

class StudentTransferController extends Controller
{

    public function index(Request $request){
      $studentTransfers = StudentTransfer::join('students', 'student_transfers.student_id', '=', 'students.id')
                     ->join('schools', 'schools.id', '=', 'students.school_id')
                     ->where('schools.id', '=', Auth::user()->school_id)
                     ->paginate(10);
      return view('student_transfers.index')->with('transfers', $studentTransfers);
    }

    public function view(Request $request){
      //view com detalhes da transferência
    }

    public function store(Request $request){
      $data = $request->all();
      $student = Student::findOrFail($data['student_id']);
      if($student->school_id !== Auth::user()->school_id){
        return response('Unauthorized', 401);
      }
      $data['old_school_id'] = Auth::user()->school_id;
      $data['user_id'] = Auth::user()->id;
      $studentTransfer = StudentTransfer::create($data);
      $student->status = 'transferred'; //Set status transferred to student and save
      $student->save();
      $student_new = $student->replicate(); //Student in new school
      $student_new->school_id = $data['new_school_id'];
      $student_new->save();
      return response()->json($student);
    }

}
