<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{

    protected $fillable = ['title', 'school_id', 'group_id'];

    public static $rules = [
      'title' => 'required',
      'group_id' => 'required'
    ];

    public function group(){
      return $this->belongsTo('App\Group');
    }

    public function grades(){
      return $this->hasMany('App\Grade');
    }

}
