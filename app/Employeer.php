<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeer extends Model
{
    protected $fillable = ['employeer_data_id', 'responsability_id', 'birth_certificate_id', 'address_id', 'general_registration_id'];

    public static $rules = [
      'responsability_id'=> 'required'
    ];

    public function employeer_data(){
      return $this->belongsTo('App\EmployeerData');
    }

    public function responsability(){
      return $this->belongsTo('App\Responsability');
    }

    public function birth_certificate(){
      return $this->belongsTo('App\BirthCertificate');
    }

    public function address(){
      return $this->belongsTo('App\Address');
    }

    public function general_registration(){
      return $this->belongsTo('App\GeneralRegistration');
    }

}
