<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{

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
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'sometimes|required|array'
        ];
    }
}
