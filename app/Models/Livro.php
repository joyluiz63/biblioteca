<?php

namespace App\Models;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editora;
use App\Models\Emprestimo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'editora_id',
        'emprestado',
    ];

    public function editoras()
    {
        return $this->belongsTo(Editora::class);
    }

    public function autors()
    {
        return $this->belongsToMany(Autor::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function emprestimos()
    {
        return $this->belongsToMany(Emprestimo::class);
    }

}
