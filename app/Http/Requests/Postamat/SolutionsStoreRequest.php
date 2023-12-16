<?php

namespace App\Http\Requests\Postamat;

use Illuminate\Foundation\Http\FormRequest;

class SolutionsStoreRequest extends FormRequest
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
            'title'     => 'required|max:50',
            'defective_id'       => 'required|integer'
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'title is required',
        'defective_id' => 'id is required',
        'title.max' => 'title must be less than 50 characters',
        'defective_id.integer' => 'id must be integer number',
    ];
}
}
