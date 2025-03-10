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
            'name' => ['bail', 'required', 'string', 'max:255'],
            'scientific_name' => ['bail', 'required', 'string', 'max:255'],
            'optimal_ph_min' => ['bail', 'required', 'numeric', 'lte:optimal_ph_max', 'min:0', 'max:14'],
            'optimal_ph_max' => ['bail', 'required', 'numeric', 'gte:optimal_ph_min', 'min:0', 'max:14'],
            'water_requirement_per_season_in_mm' => ['bail', 'required', 'integer', 'max:65535'],
            'growth_duration_in_days' => ['bail', 'required', 'integer', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'name is required.',
            'name.max' => 'name may not be greater than 255 characters.',
            'name.string' => 'name must contain text.',
            'scientific_name.required' => 'scientific name is required.',
            'scientific_name.max' => 'scientific name may not be greater than 255 characters.',
            'scientific_name.string' => 'scientific name must contain text.',
            'optimal_ph_min.required' => 'optimal pH min is required.',
            'optimal_ph_min.numeric' => 'optimal pH min must be a number.',
            'optimal_ph_min.lte' => 'optimal pH min must be less than or equal to optimal pH max.',
            'optimal_ph_min.min' => 'optimal pH min must be at least 0.0.',
            'optimal_ph_min.max' => 'optimal pH min must not be greater than 14.0.',
            'optimal_ph_max.required' => 'optimal pH max is required.',
            'optimal_ph_max.numeric' => 'optimal pH max must be a number.',
            'optimal_ph_max.gte' => 'optimal pH max must be greater than or equal to optimal pH min.',
            'optimal_ph_max.min' => 'optimal pH max must be at least 0.0.',
            'optimal_ph_max.max' => 'optimal pH max must not be greater than 14.0.',
            'water_requirement_per_season_in_mm.required' => 'water requirement per season is required.',
            'water_requirement_per_season_in_mm.integer' => 'water requirement per season must be an integer.',
            'water_requirement_per_season_in_mm.max' => 'water requirement cannot be greater than 65535.',
            'growth_duration_in_days.required' => 'growth duration is required.',
            'growth_duration_in_days.integer' => 'growth duration must be an integer.',
            'growth_duration_in_days.max' => 'growth duration cannot be greater than 255.'
        ];
    }
}
