<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employeer extends Model
{
    protected $fillable = ['employeer_data_id', 'birth_certificate_id', 'address_id', 'general_registration_id'];

    public static $rules = [
      'role'=> 'required'
    ];

    public function employeer_data(){
      return $this->belongsTo('App\EmployeerData');
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

    public function user(){
      return $this->hasOne('App\User');
    }

    public function role(){
      return DB::table('assigned_roles')
                ->join('roles', 'roles.id', '=', 'assigned_roles.role_id')
                ->where('assigned_roles.entity_id', $this->user->id)
                ->select('roles.*')
                ->first();
    }

}
