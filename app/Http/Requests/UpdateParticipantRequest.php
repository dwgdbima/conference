<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParticipantRequest extends FormRequest
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
        if ($this->routeIs('admin.active-users.update')) {
            $id = $this->active_user;
        } else {
            $id = $this->profile;
        }
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birth_of_date' => 'required|date_format:Y-m-d',
            'salutation' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'research' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:participants,phone,' . $id,
            'fax' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'info' => 'nullable|string|max:255',
        ];
    }
}
