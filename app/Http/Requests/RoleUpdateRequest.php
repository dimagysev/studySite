<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
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

    public function prepareForValidation()
    {
        if (empty($this->permissions)){
            unset($this['permissions']);
        }
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name,' . $this->post('id') ,
            'permissions' => 'sometimes|required|array'
        ];
    }
}
