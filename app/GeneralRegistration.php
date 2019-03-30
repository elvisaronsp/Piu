<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralRegistration extends Model
{

    protected $fillable = ['registration_number', 'emitter', 'registration_emission', 'cpf'];

    public static $rules = [
      'registration_number' => 'required',
      'emitter' => 'required',
      'registration_emission' => 'required',
      'cpf' => 'required|unique:general_registrations'
    ];
}
