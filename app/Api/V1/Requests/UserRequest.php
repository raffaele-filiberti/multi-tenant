<?php

namespace App\Api\V1\Requests;

use Dingo\Api\Contract\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'name' => 'required|max:255',
                    'email' => 'required|unique:users|email',
                    'password' => 'required|min:6',
                    'customer_id' => 'required|integer',
                    'role_id' => 'required|integer'

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'max:255',
                    'email' => 'unique:users|email',
                    'password' => 'min:6',
                ];
            }
            default:break;
        }

        return [

        ];
    }
}
