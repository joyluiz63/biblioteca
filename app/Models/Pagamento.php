<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        "mensalidade_id",
        "pagamento",
        "valor",
    ];

    public function mensalidades()
    {
        return $this->belongsTo(Mensalidade::class);
    }
}
