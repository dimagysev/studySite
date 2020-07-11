<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
        if (empty($this->meta_desc)){
            unset($this['meta_desc']);
        }
        if (empty($this->meta_key)){
            unset($this['meta_key']);
        }
        if (empty($this->filters)){
            unset($this['filters']);
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
            'title'         => 'required|string|max:255|',
            'alias'         => 'required|string|max:255|unique:articles',
            'img'           => 'required|file|image|mimes:jpeg,png',
            'category_id'   => 'required',
            'user_id'       => 'required',
            'filters'       => 'sometimes|required|array',
            'meta_desc'     => 'sometimes|required|string',
            'meta_key'      =>'sometimes|required|string',
            'desc'          => 'required|string',
            'text'          => 'required|string',
        ];
    }
}
