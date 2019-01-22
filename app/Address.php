<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['state', 'city', 'number', 'neighborhood', 'street', 'complement'];
}
