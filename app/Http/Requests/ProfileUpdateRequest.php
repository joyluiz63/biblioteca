<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'cpf' => ['string','max:15'], Rule::unique(User::class)->ignore($this->user()->id),
            'rua'=> ['string','max:255'],
            'numero'=> ['string','max:10'],
            'complemento'=> ['string','max:255'],
            'bairro'=> ['string','max:255'],
            'cidade'=> ['string','max:255'],
            'fone'=> ['string','max:255'],
        ];
    }
}
