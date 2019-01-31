<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\EmployeerData;
use App\GeneralRegistration;
use App\BirthCertificate;
use App\Address;
use App\Employeer;
use App\User;

class EmployeerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(
            #Address
            Address::$rules,

            # Employeers data
            EmployeerData::$rules,

            #General registration
            GeneralRegistration::$rules,

            #Birth BirthCertificate
            BirthCertificate::$rules,

            #Employeers
            Employeer::$rules,

            #user
            User::$rules

        );
    }
}
