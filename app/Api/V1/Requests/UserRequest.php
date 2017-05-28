<?php

namespace App\Api\V1\Requests;

use App\User;
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
                    'customer_id' => 'nullable',
                    'role_id' => 'required',
                    'first_name' => 'nullable|max:255',
                    'last_name' => 'nullable|max:255',
                    'cell_phone' => 'nullable|max:255',
                    'fax' => 'nullable|max:255',
                    'address' => 'nullable|max:255',
                    'postcode' => 'nullable|max:255',
                    'province' => 'nullable|max:255',
                    'city' => 'nullable|max:255',
                    'nation' => 'nullable|max:255',
                    'ibernate' => 'boolean',
                    'notify' => 'boolean',
                    'subscribed' => 'boolean'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'customer_id' => 'integer|nullable',
                    'role_id' => 'integer|nullable',
                    'name' => 'max:255',
                    'email' => 'unique:users,email,'.$this->route('user_id'),
                    'password' => 'min:6',
                    'first_name' => 'nullable|max:255',
                    'last_name' => 'nullable|max:255',
                    'cell_phone' => 'nullable|max:255',
                    'fax' => 'nullable|max:255',
                    'address' => 'nullable|max:255',
                    'postcode' => 'nullable|max:255',
                    'province' => 'nullable|max:255',
                    'city' => 'nullable|max:255',
                    'nation' => 'nullable|max:255',
                    'ibernate' => 'boolean',
                    'notify' => 'boolean',
                    'subscribed' => 'boolean'                ];
            }
            default:break;
        }

        return [

        ];
    }
}
