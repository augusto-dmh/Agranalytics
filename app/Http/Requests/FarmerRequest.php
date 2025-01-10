<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class FarmerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(
            [
                'full_name' => ['required', 'bail', 'string', 'max:255'],
                'phone_number' => ['required', 'bail', 'string', 'regex:/^\(\d{3}\) \d{3}-\d{4}$/'],
                'email' => ['required', 'bail', 'email', Rule::unique('farmers', 'email')->ignore($this->route('farmer'))],
            ],
            // the password validation is ignored when the request validation is performed on an update request and the field does not receive a value
            when(request()->method() === 'POST' || request()->password !== null, [
                'password' => [
                    'required',
                    'confirmed',
                    Password::min(8)
                        ->letters()
                        ->numbers()
                        ->symbols(),
                ]
            ], [])
        );
    }

    public function messages(): array
    {
        return [
            '*.required' => 'This field is required.',
            '*.max:255' => 'This field may not be greater than 255 characters.',
            '*.string' => 'This field must contain text.',
            'phone_number.regex' => 'The phone number should be in format (999) 999-9999',
            'password.confirmed' => 'The password confirmation does not match.',
            'email.unique' => 'Email already in use. Try another.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.letters' => 'The password must contain at least one letter',
            'password.numbers' => 'The password must contain at least one number',
            'password.symbols' => 'The password must contain at least one symbol',
        ];
    }
}
