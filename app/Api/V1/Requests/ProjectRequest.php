<?php

namespace App\Api\V1\Requests;

use Dingo\Api\Http\FormRequest;

class ProjectRequest extends FormRequest
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
                    'description' => 'nullable',
                    'private' => 'boolean'

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'max:255',
                    'description' => 'nullable',
                    'archivied' => 'boolean',
                    'private' => 'boolean'
                ];
            }
            default:break;
        }

        return [

        ];
    }
}
