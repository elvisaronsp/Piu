<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{

    protected $fillable = ['title', 'school_id'];
    
    public static $rules = [
      'title' => 'required',
      'school_id' => 'required'
    ];

}
