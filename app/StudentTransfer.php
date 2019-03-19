<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTransfer extends Model
{
    
    protected $fillable = ['student_id', 'old_school_id', 'new_school_id', 'user_id'];

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function new_school(){
        return $this->belongsTo('App\School', 'new_school_id');
    }

    public function old_school(){
        return $this->belongsTo('App\School', 'old_school_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
