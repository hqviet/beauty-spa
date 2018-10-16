<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class UpdateProductRequest extends FormRequest
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
            'name_vi' => 'required|max:50|',
            'name_en' => 'required|max:50|',
            'category' => 'required',
            'brand' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|regex:/^\d*\.?\d+$/',
            'quantity' => 'required|gt:0|integer',
            'description_vi' => 'required|max:300|',
            'description_en' => 'required|max:300|',
        ];
    }
}
