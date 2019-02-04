<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
	
    protected $fillable = ['student_group_id', 'employeer_id', 'value'];
    
    public static $rules = [
    	'value' => 'required|numeric'
    ];

    public function student_groups(){
    	return $this->belongsTo('App\StudentGroup');
    }

    public function employeer(){
    	return $this->belongsTo('App\Employeer');
    }

}
