<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
            'name' =>[Rule::requiredIf(!auth()->check()), 'string', 'max:255'],
            'email'=>[Rule::requiredIf(auth()->check()), 'email'],
            'text' => 'required',
            'parent_id' =>'integer|required',
        ];
    }
}
