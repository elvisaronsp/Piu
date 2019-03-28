<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['state', 'city', 'number', 'neighborhood', 'street', 'complement', 'cod_postal'];
    
    public static $rules = [
      'street' => 'required',
      'state' => 'required',
      'city' => 'required',
      'cod_postal' => 'required',
      'number' => 'required',
      'neighborhood' => 'required',
      'complement' => ''
    ];

    public function build(){
      return $this->street .' '. $this->number . ', ' . $this->neighborhood . ', ' . $this->city . ' - ' . $this->state;
    }

}
