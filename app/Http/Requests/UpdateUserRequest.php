<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|max:50|unique:users,email,' . $this->get('id'),
            'firstname' => 'required|max:50|',
            'lastname' => 'required|max:50|',
            'phone' => 'required|max:20|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'address' => 'required|max:150|',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];
    }
}
