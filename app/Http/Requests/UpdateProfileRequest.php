<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'user_name' => 'regex:/^[^0-9]*$/|min:10',
            'phone_number' => 'numeric|digits_between:10,11',
            'degree' => 'string|min:15|nullable',
            'experience' => 'string|min:20|nullable',
        ];
    }
}
