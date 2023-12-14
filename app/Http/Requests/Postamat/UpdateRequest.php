<?php

namespace App\Http\Requests\Postamat;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id'            => 'integer',
            'status'        => 'in:0,1',
            'system_id'     => 'size:8|regex:/PST[0-9]{5}/u',
            'address'       => 'max:255',
            'serial_number' => 'size:10|regex:/S[0-9]{9}/u
            ',
        ];
    }

    public function messages(): array
{
    return [
        'system_id.required' => 'system_id is required',
        'address.required' => 'address is required',
        'serial_number.required' => 'serial_number is required',
        'system_id.size' => 'system_id must be 8 characters',
        'serial_number.size' => 'serial_number must be 10 characters',
        'address.max' => 'address must be less than 255 characters',
        'system_id.regex' => 'system_id must match the template "PST12345"',
        'serial_number.regex' => 'serial_number must match the template "S123456789"',
    ];
}
}
