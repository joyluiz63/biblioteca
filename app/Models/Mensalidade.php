<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    use HasFactory;

    protected $fillable = [
        "usuario_id",
        "mes_referencia",
        "valor",
        "status",
    ];

    public function usuarios()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }
}
