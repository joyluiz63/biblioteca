<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'retirada', 'devolvera', 'devolvido'
    ] ;

    public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
