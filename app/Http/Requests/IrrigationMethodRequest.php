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
            'name' => ['bail', 'required', 'string', 'max:255'],
            'description' => ['bail', 'required', 'string'],
            'efficiency' => ['bail', 'required', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'name is required.',
            'name.max' => 'name may not be greater than 255 characters.',
            'name.string' => 'name must contain text.',
            'description.required' => 'description is required.',
            'description.string' => 'description must contain text.',
            'efficiency.required' => 'efficiency is required.',
            'efficiency.numeric' => 'efficiency must be a number.',
            'efficiency.min' => 'efficiency must be at least 0.',
            'efficiency.max' => 'efficiency may not be greater than 100.',
        ];
    }
}
