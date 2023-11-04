<?php

namespace App\Console\Commands;

use App\Models\Mensalidade;
use App\Models\Usuario;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GerarMensalidades extends Command
{
    protected $signature = 'gerar:mensalidades';
    protected $description = 'Gera mensalidades mensalmente para cada sócio';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $socios = DB::table('usuarios')
        ->where('socio', '=', 1)
        ->get();
        $vencimento = Carbon::now();

        foreach ($socios as $socio) {
            Mensalidade::create([
                'usuario_id'      => $socio->id,
                'valor'         => $socio->valor,
                'vencimento'    => $vencimento,
            ]);
        }

        $this->info('Mensalidades geradas com sucesso!');
    }
}
