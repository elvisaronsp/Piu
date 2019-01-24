<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralRegistration extends Model
{
    public static $rules = [
      'registration_number' => 'required',
      'emitter' => 'required',
      'emission' => 'required',
      'cpf' => 'unique:general_registrations|required'
    ];
}
