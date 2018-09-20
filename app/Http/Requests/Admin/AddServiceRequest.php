<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddServiceRequest extends FormRequest
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
            'cat_id' => 'required',
            'title' => 'required|max:100',
            'image' => 'required|image',
            'short_description' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0|max:10000000000',
        ];
    }
}
