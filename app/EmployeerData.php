<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeerData extends Model
{
    public static $rules = [
      'sus_card' => 'required',
      'allergic' => '',
      'breed' => 'required',
      'formation' => 'required',
      'specialization' => '',
      'contract' => '',
      'statutary' => 'required',
      'workload' => 'required',
      'observations' => ''
    ];
}
