<?php

namespace App\Http\Requests\Posterminal;

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
            'system_id'     => 'size:8|regex:/POS[0-9]{5}/u',
            'address'       => 'max:255',
            'serial_number' => 'size:10|regex:/S[0-9]{9}/u',
        ];
    }
}
