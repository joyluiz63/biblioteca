<?php

namespace App\Models;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome","espirito"
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }

}
