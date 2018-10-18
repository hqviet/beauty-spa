<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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
            'name' => 'required|max:100',
            'phone' => 'required|max:100',
            'email' => 'required|max:191|email',
            'date' => 'required|date_format:Y-m-d,
        ];
    }
}
