<?php

namespace App\Api\V1\Requests;

use Dingo\Api\Http\FormRequest;

class TaskRequest extends FormRequest
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
//                  'user_id' => ...
                    'template_id' => 'required|integer',
                    'product_manager_id' => 'required|integer',
                    'name' => 'required|max:255',
                    'description' => 'nullable',
                    'country' => 'max:5|nullable',
                    'private' => 'boolean',
                    'deadline' => 'required|date'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'product_manager_id' => 'integer',
                    'name' => 'max:255',
                    'description' => 'nullable',
                    'archivied' => 'boolean',
                    'billed' => 'boolean',
                    'private' => 'boolean',
                    'item_number' => 'max:255',
                    'design_type' => 'integer',
                    'deadline' => 'date',
                    'country' => 'max:5|nullable'
                ];
            }
            default:break;
        }

        return [

        ];
    }
}
