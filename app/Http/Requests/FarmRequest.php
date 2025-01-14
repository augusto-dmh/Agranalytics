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
            'farmer_id' => ['required', 'exists:farmers,id'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'size_in_ha' => ['required', 'numeric', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'soil_type_id' => ['required', 'exists:soil_types,id'],
            'irrigation_method_id' => ['required', 'exists:irrigation_methods,id'],
            'crop_id.*' => ['nullable', 'exists:crops,id'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'This field is required.',
            'name.max' => 'Name may not be greater than 255 characters.',
            'address.max' => 'Address may not be greater than 255 characters.',
            '*.string' => ':attribute must contain text.',
            '*.numeric' => ':attribute must contain a number.',
            'farmer_id.exists' => 'The selected farmer is invalid.',
            'size_in_ha.regex' => 'The size in hectares must be a number with up to 6 digits before the decimal point and up to 2 digits after the decimal point.',
            'soil_type_id.exists' => 'The selected soil type is invalid.',
            'irrigation_method_id.exists' => 'The selected irrigation method is invalid.',
            'crop_id.*.exists' => 'The selected crops are invalid.'
        ];
    }
}
