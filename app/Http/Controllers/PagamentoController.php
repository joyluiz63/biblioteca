<?php

namespace App\Http\Controllers;

use App\Models\Mensalidade;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagamentoController extends Controller
{

    public function edit(string $id)
    {
        $usuarios = DB::table('mensalidades')
        ->leftJoin('pagamentos','mensalidades.id','=','pagamentos.mensalidade_id')
        ->join('usuarios','mensalidades.usuario_id','=','usuarios.id')
        ->where('usuarios.id','=', $id)
        ->where('pagamentos.pagamento','=', null)
        ->select('usuarios.id as usuario_id', 'usuarios.valor', 'usuarios.nome', 'mensalidades.id as mensalidade_id', 'mensalidades.mes_referencia')
        ->paginate(10);

        //dd($usuarios);
        $usuarioId = $usuarios[0]->usuario_id;


        return view('pagamentos.edit', compact('usuarios', 'usuarioId'));
    }

    public function receberPagamento(Request $request)
    {
        $data = $request->all();
        $dataPagamento = $data["pagamento"];
        //dd($data['mensalidade'][0]['valor']);
        $salvo = 0;

        for ($i = 0; $i < count($data['mensalidade']); $i++) {
            $valor = $data['mensalidade'][$i]['valor'];
            $mensalidadeId = $data['mensalidade'][$i]['id'];
            if ($valor) {
                //Crie um novo registro na tabela de pagamentos
                $pagamento = new Pagamento();
                $pagamento->mensalidade_id = $mensalidadeId;
                $pagamento->pagamento = $dataPagamento;
                $pagamento->valor = $valor;
                $pagamento->save();
                $salvo = $pagamento->id;

                // Atualize o status da mensalidade para indicar que foi paga (supondo que 1 indica pagamento)
                $mensalidade = Mensalidade::find($data['mensalidade'][$i]['id']);
                $mensalidade->status = 1;
                $mensalidade->save();
            }

        }
        if ($salvo > 0) {
            // Redirecione com uma mensagem de sucesso
        return redirect()->route('mensalidades.index')
        ->with('success', 'Pagamento efetuado com sucesso!');
        } else {
            // Redirecione com uma mensagem de falha
        return redirect()->route('mensalidades.index')
        ->with('success', 'É necessário informar pelo menos o valor de uma mensalidade para registro!');
        }

    }
}


