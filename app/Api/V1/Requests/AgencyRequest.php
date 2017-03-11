<?php

namespace App\Api\V1\Requests;

use Dingo\Api\Http\FormRequest;

class AgencyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:agencies'
        ];
    }

    public function authorize()
    {
        return true;
    }
}