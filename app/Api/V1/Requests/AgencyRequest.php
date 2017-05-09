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
                    'name' => 'required|max:255|unique:agencies',
                    'description' => 'max:1000|nullable',
                    'motto' => 'max:255|nullable'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'max:255|unique:agencies,name,' .$this->route('id'),
                    'description' => 'max:1000|nullable',
                    'motto' => 'max:255|nullable'


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