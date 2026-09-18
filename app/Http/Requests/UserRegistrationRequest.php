<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ];
    }

     public function messages(): array
    {
        return [
            // Name field rules
            'name.required' => 'Por favor, informe o seu nome.',
            'name.string'   => 'O nome deve conter caracteres válidos.',
            'name.max'      => 'O nome não deve possuir mais do que 100 caracteres.',

            // Email field rules
            'email.required' => 'É necessário informar um endereço de e-mail para criar uma conta.',
            'email.email'    => 'O formato do e-mail fornecido é inválido.',
            'email.unique'   => 'O endereço de e-mail fornecido já encontra-se em uso.',

            // Password field rules
            'password.required' => 'É necessário informar uma senha.',
            'password.min'      => 'A senha deve conter pelo menos 8 caracteres.',
        ];
    }
}
