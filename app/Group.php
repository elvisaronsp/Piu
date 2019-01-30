<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = ['title', 'school_id'];

    public static $rules = [
      'title' => 'required'
    ];

    public function school(){
      return $this->belongsTo('App\School');
    }

}