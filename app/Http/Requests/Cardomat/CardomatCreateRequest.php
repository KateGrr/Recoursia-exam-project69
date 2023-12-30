<?php

namespace App\Http\Requests\Cardomat;

use Illuminate\Foundation\Http\FormRequest;

class CardomatCreateRequest extends FormRequest
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
            'address' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'system_id' => 'required|size:8|regex:/CRD[0-9]{5}/u|unique:cards,system_id',
            'serial_number' => 'required|size:10|regex:/S[0-9]{9}/u|unique:cards,serial_number',
        ];
    }
}
