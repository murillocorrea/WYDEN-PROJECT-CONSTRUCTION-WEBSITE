<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInformationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow the request
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
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => [
                'required',
                'regex:/^\(\d{2}\) 9 \d{4}-\d{4}$/',
            ],
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ];
    }

    /**
     * Custom error messages for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            'phone.required' => 'O número de telefone é obrigatório.',
            'phone.regex' => 'O número de telefone deve estar no formato (55) 9 9999-9999.',
            'subject.required' => 'O campo assunto é obrigatório.',
            'subject.max' => 'O assunto não pode ter mais de 255 caracteres.',
            'message.required' => 'O campo mensagem é obrigatório.',
            'message.min' => 'A mensagem deve ter pelo menos 10 caracteres.',
        ];
    }
}
