<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name', 'address_id', 'birth_certificate_id', 'born_in', 'genre'];

    public static $rules = [
      'name' => 'required',
      'address_id' => 'required',
      'birth_certificate_id'=> 'required',
      'born_in' => 'required',
      'genre' => 'required'
    ];

}
