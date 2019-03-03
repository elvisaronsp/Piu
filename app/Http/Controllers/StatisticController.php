<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Employeer;
use App\Group;
use Auth;

class StatisticController extends Controller
{

    public function studentsCount(Request $request){
      $count = Student::where('school_id', Auth::user()->school_id)->count();
      return response()->json(['count'=> $count]);
    }

    public function employeersCount(Request $request){
      $count = Employeer::join('users', 'users.employeer_id', '=', 'employeers.id')
                          ->where('users.school_id', Auth::user()->school_id)
                          ->count();
      return response()->json(['count'=> $count]);
    }

    public function groupsCount(Request $request){
      $count = Group::where('school_id', Auth::user()->school_id)->count();
      return response()->json(['count'=> $count]);
    }

}
