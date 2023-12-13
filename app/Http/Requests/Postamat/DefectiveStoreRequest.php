<?php

namespace App\Http\Requests\Postamat;

use Illuminate\Foundation\Http\FormRequest;

class DefectiveStoreRequest extends FormRequest
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
            'title'     => 'max:50',
            'address'       => 'max:255'
        ];
    }
}
