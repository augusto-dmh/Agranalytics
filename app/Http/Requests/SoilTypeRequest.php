<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoilTypeRequest extends FormRequest
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
            'ph_min' => ['required', 'numeric', 'min:0', 'max:14'],
            'ph_max' => ['required', 'numeric', 'min:0', 'max:14'],
            'organic_matter_percentage' => ['required', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'This field is required.',
            'name.max' => 'Name may not be greater than 255 characters.',
            '*.string' => ':attribute must contain text.',
            '*.numeric' => ':attribute must contain a number.',
            'ph_min.min' => 'pH minimum value must be at least 0.',
            'ph_min.max' => 'pH minimum value may not be greater than 14.',
            'ph_max.min' => 'pH maximum value must be at least 0.',
            'ph_max.max' => 'pH maximum value may not be greater than 14.',
            'organic_matter_percentage.min' => 'Organic matter percentage must be at least 0.',
            'organic_matter_percentage.max' => 'Organic matter percentage may not be greater than 100.',
        ];
    }
}
