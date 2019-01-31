<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{

    protected $fillable = ['book', 'birth_number', 'leaf', 'birth_emission', 'term'];

    public static $rules = [
      'book' => 'required',
      'birth_number' => ['required'],
      'leaf' => 'required',
      'birth_emission' => 'required',
      'term' => 'required'
    ];
}
