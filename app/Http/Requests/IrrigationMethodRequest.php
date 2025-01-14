<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IrrigationMethodRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'efficiency' => ['required', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'This field is required.',
            'name.max' => 'Name may not be greater than 255 characters.',
            '*.string' => ':attribute must contain text.',
            '*.numeric' => ':attribute must contain a number.',
            'efficiency.min' => 'Efficiency must be at least 0.',
            'efficiency.max' => 'Efficiency may not be greater than 100.',
        ];
    }
}
