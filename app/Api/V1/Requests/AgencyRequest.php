<?php

namespace App\Api\V1\Requests;

use Dingo\Api\Http\FormRequest;

class AgencyRequest extends FormRequest
{
    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|max:255|unique:agencies'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'max:255'

                ];
            }
            default:break;
        }

        return [

        ];
    }

    public function authorize()
    {
        return true;
    }
}