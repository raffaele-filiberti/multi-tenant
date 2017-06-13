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
                    'description' => 'max:1000|nullable',
                    'deadline' => 'required|date',
                    'country' => 'max:5|nullable',
                    'private' => 'boolean'
                ];

                foreach($this->request->get('steps') as $key => $val)
                {
                    $rules['steps.'.$key.'.expiring_date'] = 'required|date';
                }

                return $rules;
            }
            case 'PUT':
            case 'PATCH': {
                $rules = [
                    'product_manager_id' => 'integer',
                    'item_number' => 'max:255',
                    'design_type' => 'integer',
                    'name' => 'max:255',
                    'description' => 'max:1000|nullable',
                    'deadline' => 'date',
                    'country' => 'max:5',
                    'private' => 'boolean',
                    'archivied' => 'boolean',
                    'billed' => 'boolean'
                ];

                if ($this->request->get('steps'))
                {
                    foreach ($this->request->get('steps') as $key => $val) {
                        $rules['steps.' . $key . '.expiring_date'] = 'date';
                    }
                }

                return $rules;

            }
            default:break;
        }

        return [

        ];
    }
}
