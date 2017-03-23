<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class SignUpAsAgencyRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('boilerplate.sign_up_as_agency.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
