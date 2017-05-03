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
                $rules = [
                    'template_id' => 'required|integer',
                    'product_manager_id' => 'integer|nullable',
                    'item_number' => 'max:255|nullable',
                    'design_type' => 'integer|nullable',
                    'name' => 'required|max:255',
                    'description' => 'nullable',
                    'country' => 'max:5|nullable',
                    'private' => 'boolean',
                    'deadline' => 'required|date'
                ];

                foreach($this->request->get('steps') as $key => $val)
                {
                    $rules['steps.'.$key.'.expiring_date'] = 'required|date_format:Y-m-d';
                }

                return $rules;
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'product_manager_id' => 'integer',
                    'item_number' => 'max:255|nullable',
                    'design_type' => 'integer|nullable',
                    'name' => 'max:255',
                    'description' => 'nullable',
                    'archivied' => 'boolean',
                    'billed' => 'boolean',
                    'private' => 'boolean',
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
