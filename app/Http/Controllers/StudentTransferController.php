<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentTransfer;
use App\Student;
use Auth;
use App\Http\Resources\StudentTransferCollection;
use Flash;

class StudentTransferController extends Controller
{

    public function index(Request $request){
      $studentTransfers = StudentTransfer::join('students', 'student_transfers.student_id', '=', 'students.id')
                     ->join('schools', 'schools.id', '=', 'students.school_id')
                     ->where('schools.id', '=', Auth::user()->school_id)
                     ->paginate(10);
      return view('student_transfers.index')->with('transfers', $studentTransfers);
    }

    public function view(Request $request, $id){
      $transfer = StudentTransfer::where([
                                   ['id', '=', $id],
                                   ['new_school_id', '=', Auth::user()->school_id],
                                 ])->firstOrFail();
      return view('student_transfers.view')->with('transfer', $transfer);
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
      return response()->json($student);
    }

    public function pending(Request $request){
      $transfers = StudentTransfer::where([
                      ['new_school_id', '=', Auth::user()->school_id]
                    ])
                    ->whereColumn('created_at', 'updated_at')
                    ->get();
      $collection = new StudentTransferCollection($transfers);
      return response()->json($collection);
    }

    public function update(Request $request, $id){
      $transfer = StudentTransfer::where([
                                   ['id', '=', $id],
                                   ['new_school_id', '=', Auth::user()->school_id],
                                 ])->firstOrFail();
      $transfer->accepted = $request->input('accepted');
      $transfer->save();
      if($transfer->accepted){
        $transfer->student->status = 'transferred'; //Set status transferred to student and save
        $transfer->student->save();
        $student_new = $transfer->student->replicate(); //Student in new school
        $student_new->school_id = $transfer->new_school_id;
        $student_new->status = 'idle';
        $student_new->save();
        Flash::success('Aluno aceito com sucesso! Agora você pode manipulá-lo como um dos seus alunos na sua instituição.');
      }else{
        $transfer->save();
        Flash::success('Transferência recusada com sucesso! A escola solicitante receberá uma mensagem informando a recusa.');
      }
      return redirect()->back();                                 
    }

}
