<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['name', 'value', 'school_id'];
    
    public static $rules = [
      'name' => 'required|unique:options',
      'value' => 'required'
    ];
  
}
