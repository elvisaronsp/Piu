<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    
    protected $fillable = ['title', 'school_id'];

    public static $rules = [
        'title' => 'required',
    ];

    

}
