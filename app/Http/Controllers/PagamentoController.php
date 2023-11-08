<?php

namespace App\Http\Controllers;

use App\Models\Mensalidade;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function receberPagamento(Request $request)
    {
        $data = $request->all();
        $dataPagamento = $data["pagamento"];
        //dd($data['mensalidade'][0]['valor']);

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

                // Atualize o status da mensalidade para indicar que foi paga (supondo que 1 indica pagamento)
                $mensalidade = Mensalidade::find($data['mensalidade'][$i]['id']);
                $mensalidade->status = 1;
                $mensalidade->save();
            }

        }
        // Redirecione para a página de sucesso ou exiba uma mensagem de sucesso
        return redirect()->route('mensalidades.index')
            ->with('success', 'Pagamento efetuado com sucesso!');
    }
}


