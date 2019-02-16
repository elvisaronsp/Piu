<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\SchoolCreated;
use Storage;

class School extends Model
{
    protected $fillable = ['name', 'code', 'address_id', 'act_creation', 'act_creation_date', 'direc_number',
                           'logo', 'city_logo'];

    public static $rules = [
      'name' => ['required', 'string', 'max:255'],
      'code' => ['required', 'string', 'max:255'],
      'act_creation' => ['required'],
      'act_creation_date' => ['required'],
      'direc_number' => ['required'],
      'logo' => ['required'],
      'logo_city' => ['required'],
    ];

    protected $dispatchesEvents = [
      'created' => SchoolCreated::class
    ];

    public function urlLogo(){
        return "/images/{$this->logo}";
    }

    public function address(){
      return $this->belongsTo('App\Address');
    }

}
