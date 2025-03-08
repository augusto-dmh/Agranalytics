<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmRequest extends FormRequest
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
            'farmer_id' => ['bail', 'required', 'exists:farmers,id'],
            'name' => ['bail', 'required', 'string', 'max:255'],
            'address' => ['bail', 'required', 'string', 'max:255'],
            'size_in_ha' => ['bail', 'required', 'numeric', 'between:0,999999.99'],
            'soil_type_id' => ['bail', 'required', 'exists:soil_types,id'],
            'irrigation_method_id' => ['bail', 'required', 'exists:irrigation_methods,id'],
            'crop_id.*' => ['bail', 'nullable', 'exists:crops,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'farmer_id.required' => 'farmer is required.',
            'farmer_id.exists' => 'selected farmer is invalid.',
            'name.required' => 'name is required.',
            'name.string' => 'name must contain text.',
            'name.max' => 'name may not be greater than 255 characters.',
            'address.required' => 'address is required.',
            'address.string' => 'address must contain text.',
            'address.max' => 'address may not be greater than 255 characters.',
            'size_in_ha.required' => 'size is required.',
            'size_in_ha.numeric' => 'size must be a number.',
            'size_in_ha.between' => 'size must be between 0 and 999999.99.',
            'soil_type_id.required' => 'soil type is required.',
            'soil_type_id.exists' => 'selected soil type is invalid.',
            'irrigation_method_id.required' => 'irrigation method is required.',
            'irrigation_method_id.exists' => 'selected irrigation method is invalid.',
            'crop_id.*.exists' => 'crop of position #:position is invalid.'
        ];
    }
}
