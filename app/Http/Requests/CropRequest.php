<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CropRequest extends FormRequest
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
            'scientific_name' => ['required', 'string', 'max:255'],
            'optimal_ph_min' => ['required', 'numeric', 'lte:optimal_ph_max', 'min:0', 'max:14'],
            'optimal_ph_max' => ['required', 'numeric', 'gte:optimal_ph_min', 'min:0', 'max:14'],
            'water_requirement_per_season_in_mm' => ['required', 'integer', 'max:65535'],
            'growth_duration_in_days' => ['required', 'integer', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'This field is required.',
            'name.max' => 'Name may not be greater than 255 characters.',
            'scientific_name.max' => 'Scientific Name may not be greater than 255 characters.',
            '*.string' => ':attribute must contain text.',
            '*.numeric' => ':attribute must contain a number.',
            '*.lt' => ':attribute cannot be lesser than :attribute.',
            '*.gt' => ':attribute cannot be greater than :attribute.',
            'optimal_ph_min.min' => 'The optimal pH min must be at least 0.0.',
            'optimal_ph_min.max' => 'The optimal pH min must not be greater than 14.0.',
            'optimal_ph_max.min' => 'The optimal pH max must be at least 0.0.',
            'optimal_ph_max.max' => 'The optimal pH max must not be greater than 14.0.',
            'water_requirement_per_season_in_mm.max' => 'Water requirement cannot be greater than 65535.',
            'growth_duration_in_days.max' => 'Growth Duration cannot be greater than 255.'
        ];
    }
}
