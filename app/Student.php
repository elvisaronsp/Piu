<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name', 'address_id', 'birth_certificate_id', 'born_in', 'genre', 'school_id', 'general_registration_id',
                           'multi_activity', 'sus', 'bolsa_familia', 'father_contact', 'mother_contact'];

    public static $rules = [
      'name' => 'required',
      'born_in' => 'required',
      'genre' => 'required',
      'sus' => 'required',
      'bolsa_familia' => 'nullable',
      'multi_activity' => 'nullable',
      'father_contact' => 'nullable',
      'mother_contact' => 'nullable'
    ];

    public function address(){
      return $this->belongsTo('App\Address');
    }

    public function birth_certificate(){
      return $this->belongsTo('App\BirthCertificate');
    }

    public function student_group(){
      return $this->hasMany('App\StudentGroup');
    }

    public function general_registration(){
      return $this->belongsTo('App\GeneralRegistration');
    }

    public function school(){
      return $this->belongsTo('App\School');
    }

}
