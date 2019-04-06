<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{

    protected $fillable = ['book', 'birth_number', 'leaf', 'birth_emission', 'term', 'emission_city', 'emission_state'];

    public static $rules = [
      'book' => 'required',
      'birth_number' => ['required'],
      'leaf' => 'required',
      'birth_emission' => 'required',
      'term' => 'required',
      'emission_city' => 'required',
      'emission_state' => 'required'
    ];
}
