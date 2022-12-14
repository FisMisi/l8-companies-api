<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'registration_number' => ['required', 'string', 'max:11'],
            'foundation_date' => ['required', 'date'],
            'country' => ['required', 'string', 'max:100'],
            'zip_code' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:100'],
            'street_address' => ['required', 'string', 'max:100'],
            'latitude' => ['required', 'string', 'max:30'],
            'longitude' => ['required', 'string', 'max:30'],
            'owner' => ['required', 'string', 'max:30'],
            'employees' => ['required', 'integer'],
            'activity' => ['required', 'string', 'max:50'],
            'active' => ['required', 'boolean'],
            'email' => ['required', 'email', 'unique:companies,email', 'max:100'],
            'password' => ['required', 'string', 'min:2', 'max:30'],
        ];
    }
}
