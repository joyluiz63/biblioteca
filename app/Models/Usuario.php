<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'socio',
        'nome',
        'nascimento',
        'cpf',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'fone',
        'email',
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }

    public function mensalidades(){
        return $this->hasMany(Mensalidade::class);
    }
}
