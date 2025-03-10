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
            'name' => ['bail', 'required', 'string', 'max:255'],
            'description' => ['bail', 'required', 'string'],
            'ph_min' => ['bail', 'required', 'numeric', 'min:0', 'max:14', 'lte:ph_max'],
            'ph_max' => ['bail', 'required', 'numeric', 'min:0', 'max:14', 'gte:ph_min'],
            'organic_matter_percentage' => ['bail', 'required', 'numeric', 'min:0', 'max:100'],
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
            'ph_min.required' => 'pH minimum value is required.',
            'ph_min.numeric' => 'pH minimum value must be a number.',
            'ph_min.min' => 'pH minimum value must be at least 0.',
            'ph_min.max' => 'pH minimum value may not be greater than 14.',
            'ph_min.lte' => 'pH minimum value must be less than or equal to pH maximum value.',
            'ph_max.required' => 'pH maximum value is required.',
            'ph_max.numeric' => 'pH maximum value must be a number.',
            'ph_max.min' => 'pH maximum value must be at least 0.',
            'ph_max.max' => 'pH maximum value may not be greater than 14.',
            'ph_max.gte' => 'pH maximum value must be greater than or equal to pH minimum value.',
            'organic_matter_percentage.required' => 'organic matter percentage is required.',
            'organic_matter_percentage.numeric' => 'organic matter percentage must be a number.',
            'organic_matter_percentage.min' => 'organic matter percentage must be at least 0.',
            'organic_matter_percentage.max' => 'organic matter percentage may not be greater than 100.',
        ];
    }
}
