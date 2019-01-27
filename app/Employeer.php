<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeer extends Model
{
    protected $fillable = ['employeer_data_id', 'responsability_id', 'birth_certificate_id', 'address_id', 'general_registration_id'];

    public static $rules = [
      'responsability_id'=> 'required'
    ];

}
