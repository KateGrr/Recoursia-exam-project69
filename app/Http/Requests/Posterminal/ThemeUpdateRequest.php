<?php

namespace App\Http\Requests\Posterminal;

use Illuminate\Foundation\Http\FormRequest;

class ThemeUpdateRequest extends FormRequest
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
            'id'          => 'integer',
            'title'       => 'min:3|max:50',
            'description' => 'min:3|max:255',
        ];
    }
}
