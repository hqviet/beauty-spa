<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name_vi' => 'required|unique:product_trans,name',
            'name_en' => 'required|unique:product_trans,name',
            'category' => 'required',
            'brand' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|regex:/^\d*\.?\d+$/',
            'quantity' => 'required|gt:0|integer',
            'description_vi' => 'required',
            'description_en' => 'required',
        ];
    }
}
