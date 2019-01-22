<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'code', 'address_id', 'act_creation', 'act_creation_date', 'direc_number',
                           'logo', 'city_logo'];
}
