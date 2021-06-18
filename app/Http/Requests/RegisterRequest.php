<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birth_of_date' => 'required|date_format:Y-m-d',
            'salutation' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'research' => 'required|string|max:255',
            'email' => 'required|confirmed|string|email|max:255|unique:users',
            'password' => 'required|confirmed|string|min:6|max:12',
            'phone' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'info' => 'nullable|string|max:255',
        ];
    }
}
