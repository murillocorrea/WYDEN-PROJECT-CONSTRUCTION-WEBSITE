<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'projectName' => 'required|string|max:255',
            'projectPrice' => 'required|numeric|gt:0', // gt:0 garante que o valor seja maior que zero
            'projectDescription' => 'required|string',
        ];
    }

    /**
     * Customize the error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'projectName.required' => 'The project name is required.',
            'projectName.string' => 'The project name must be a string.',
            'projectName.max' => 'The project name may not be greater than 255 characters.',
            'projectPrice.required' => 'The project price is required.',
            'projectPrice.numeric' => 'The project price must be a number.',
            'projectPrice.gt' => 'The project price must be greater than zero.',
            'projectDescription.required' => 'The project description is required.',
            'projectDescription.string' => 'The project description must be a string.',
        ];
    }
}
