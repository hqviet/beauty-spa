<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class EditInfoRequest extends FormRequest
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
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone' => 'required|max:100',
            'address' => 'required|max:100',
            'email' => 'required|email|max:191',
            'password' => $this->password?'min:6|max:100':'',
            'confirm_password' => 'same:password',
        ];
    }
}
