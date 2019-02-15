<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    protected $fillable = ['student_id', 'group_id', 'enabled'];

    public function student(){
      return $this->belongsTo('App\Student');
    }

    public function group(){
      return $this->belongsTo('App\Group');
    }

    public function grades(){
      return $this->hasMany('App\Grade');
    }

}
