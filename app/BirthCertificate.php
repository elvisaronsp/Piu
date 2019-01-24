<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    public static $rules = [
      'book' => 'required',
      'birth_number' => 'required|unique:birth_certificates',
      'leaf' => 'required',
      'emission' => 'required',
      'term' => 'required'
    ];
}
