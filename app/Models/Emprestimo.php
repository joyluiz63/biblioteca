<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id', 'retirada', 'devolvera'
    ] ;

    public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class);
    }
}
