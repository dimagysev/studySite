<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        return [
            'name'      => 'required|string|max:255',
            'login'     => 'required|string|max:255|unique:users',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|string|min:9',
            'role_id'   => 'required',
        ];
    }
}
