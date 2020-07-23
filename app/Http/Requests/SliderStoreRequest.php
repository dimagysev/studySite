<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
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
        if (empty($this->title)){
            unset($this['title']);
        }
        if (empty($this->desc)){
            unset($this['desc']);
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
            'title'         => 'sometimes|string',
            'img'           => 'required|file|image|mimes:jpeg,png',
            'text_position' => 'sometimes|string',
            'desc'          => 'sometimes|string|max:255',
        ];
    }
}
