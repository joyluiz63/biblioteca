<?php

namespace App\Models;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;

    protected $fillable = ['nome'] ;

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}

