<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\EmployeerData;
use App\GeneralRegistration;
use App\BirthCertificate;

class EmployeerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            # Employeers data
            EmployeerData::$rules,

            #General registration
            GeneralRegistration::$rules,

            #Birth BirthCertificate
            BirthCertificate::$rules

        ];
    }
}
