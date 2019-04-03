<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = ['title', 'school_id'];

    public static $rules = [
      'title' => 'required',
      'shift' => 'required'
    ];

    public function school(){
      return $this->belongsTo('App\School');
    }

    public function stuffs(){
      return $this->hasMany('App\Stuff');
    }

}
