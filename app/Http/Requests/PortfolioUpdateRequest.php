<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioUpdateRequest extends FormRequest
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
        if (empty($this->customer)){
            unset($this['customer']);
        }
        if (empty($this->customer)){
            unset($this['related']);
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
            'alias'         => 'required|max:255|unique:portfolios,alias,' . $this->post('id'),
            'customer'      => 'sometimes|required|string',
            'img'           => 'sometimes|file|image|mimes:jpeg,png',
            'filters'       => 'sometimes|required|array',
            'related'       => 'sometimes|required|array',
            'meta_desc'     => 'sometimes|required|string',
            'meta_key'      => 'sometimes|required|string',
            'text'          => 'required|string',
        ];
    }
}
