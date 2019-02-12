<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\GradeSaved;

class Grade extends Model
{

    protected $fillable = ['student_group_id', 'employeer_id', 'value', 'stuff_id', 'unit_id'];

    public static $rules = [
      'student_group_id' => 'required',
      'stuff_id' => 'required',
      'unit_id' => 'required',
    	'value' => 'required|numeric'
    ];

    public function student_group(){
    	return $this->belongsTo('App\StudentGroup');
    }

    public function employeer(){
    	return $this->belongsTo('App\Employeer');
    }

    public function stuff(){
      return $this->belongsTo('App\Stuff');
    }

    public function unit(){
      return $this->belongsTo('App\Unit');
    }

}
