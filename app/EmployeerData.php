<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeerData extends Model
{

    protected $fillable = ['sus_card', 'allergic', 'breed', 'formation', 'specialization',
                           'contract', 'statutory', 'workload', 'observations'];

    public static $rules = [
      'sus_card' => 'required',
      'allergic' => '',
      'breed' => 'required',
      'formation' => 'required',
      'specialization' => '',
      'contract' => '',
      'statutory' => 'required',
      'workload' => 'required',
      'observations' => ''
    ];
}
