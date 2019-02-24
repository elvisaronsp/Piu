<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use Notifiable;
    use HasRolesAndAbilities;

    public static $rules = [
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:6', 'confirmed'],
      'employeer_id' => '',
      'password_confirmation' => ['required', 'min:6', 'same:password'] //Não sei se precisa disso aqui
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'employeer_id', 'school_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function employer(){
      return $this->belongsTo('App\Employeer');
    }

    public function school(){
      return $this->belongsTo('App\School');
    }

    /*
      Retorna 0 se o employeer for uma instituição (super user)
    */
    public function getEmployeerIdAttribute($employeer_id){
      if($employeer_id == null){
        return 0;
      }
      return $employeer_id;
    }

}
