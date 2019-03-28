<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialDetails extends Model
{

    protected $fillable = ['activity', 'shift', 'observations'];
    
    public static $rules = [

    ];

}
