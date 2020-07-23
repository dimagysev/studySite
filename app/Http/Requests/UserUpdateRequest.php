<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if (empty($this->password)){
            unset($this['password']);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'login'     => 'required|string|max:255|unique:users,login,' . $this->id,
            'email'     => 'required|email|max:255|unique:users,email,' . $this->id,
            'password'  => 'sometimes|required|string|min:9'
        ];
    }
}
