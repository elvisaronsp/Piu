<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name', 'address_id', 'birth_certificate_id', 'born_in', 'genre', 'school_id', 'general_registration_id'];

    public static $rules = [
      'name' => 'required',
      'born_in' => 'required',
      'genre' => 'required'
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

}
