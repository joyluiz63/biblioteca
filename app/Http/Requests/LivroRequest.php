<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'titulo' => ['required', 'string', 'max:255'],
            'editora_id' => ['required'],
            'autor_id' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required'  => 'O campo :attribute é obrigatório',
            'max'       => 'O campo :attribute deve ter no máximo :max caracteres',
            'string'    => 'O campo :attribute deve conter uma string',
            'lowercase' => 'O campo :attribute não pode ter letras maiusculas',
            'unique'    => 'O :attribute informado já existe',

        ];
    }
}
