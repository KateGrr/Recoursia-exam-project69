<?php

namespace App\Http\Requests\Cardomat;

use Illuminate\Foundation\Http\FormRequest;

class RequeestsCreateRequest extends FormRequest
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
            'status' => 'required|in:0,1,2,3',
            'solution_id' => ($this->input('status') == 2) ? 'required' : '',
        ];
    }

    public function messages(): array
    {
        return [
            'solution_id.required' => 'solution_id is required',
        ];
    }
}