<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email' => 'required|max:40|email|unique:users,email',
            'password' => 'required|max:20',
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'address' => 'required|max:150',
            'phone' => 'required|max:20',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
