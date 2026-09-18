<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreIncidenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'titulo' => ['required', 'string', 'max:150'],
            'descricao' => ['string', 'max:500'],
            'data_hora' => ['required', 'date_format:Y-m-d H'],
            'bairro' => ['required', 'string', 'max:100'],
            'cidade' => ['required', 'string', 'max:100'],
            'uf' => ['required', 'string', 'max:2'],
            'latitude' => ['required', 'double'],
            'longitude' => ['required', 'double'],
            'user_id' => ['required', 'integer']
        ];
    }
}
