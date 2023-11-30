<?php

namespace App\Http\Controllers;

use App\Models\Mensalidade;
use App\Models\Pagamento;
use App\Models\Usuario;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensalidadeController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->search;
        if ($data) {

            $socios = DB::table("usuarios")
                ->where("usuarios.socio", "=", "1")
                ->where("usuarios.nome", "like", "%" . $data . "%")
                ->paginate(7);
        } else {

            $socios = DB::table("usuarios")
                ->where("usuarios.socio", "=", "1")
                ->paginate(7);
        }

        return view("mensalidades.index", compact("socios"));
    }

    public function show(string $id)
    {
        $usuarios = DB::table('mensalidades')
            ->join('usuarios', 'usuarios.id', '=', 'mensalidades.usuario_id')
            ->leftJoin('pagamentos', 'mensalidades.id', '=', 'pagamentos.mensalidade_id')
            ->where('mensalidades.usuario_id', '=', $id)
            ->select('usuarios.id as usuario_id', 'usuarios.nome', 'mensalidades.mes_referencia', 'pagamentos.valor', 'pagamentos.pagamento as data')
            ->orderBy('pagamentos.pagamento', 'asc')
            ->orderBy('mensalidades.mes_referencia', 'desc')
            ->paginate(7);

        $nome = Usuario::findOrFail($id);
        $nome = $nome->nome;
        //dd($usuarios);
        return view('mensalidades.show', compact('usuarios', 'nome'));
    }

    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);


        return view('mensalidades.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        Usuario::where('id', $id)
            ->update(['valor' => $request['valor']]);

        return redirect()->route('mensalidades.index')
            ->with('success', 'Mensalidade alterada com sucesso!');
    }

    public function create(Request $request)
    {
        if ($request->all()) {
            $socio = Usuario::findOrFail($request->id);
            return view('mensalidades.create2', compact('socio'));
        } else
            return view('mensalidades.create');
    }

    public function geraMensalidades(Request $request)
    {
        $data = $request->all();
        $socios = DB::table('usuarios')
            ->where('socio', '=', 1)
            ->get();

        $mes = date('m');
        $ano = date('Y');

        if ($data["ano"]) {
            $ano = $data["ano"];
        }
        if ($data["mes"]) {
            $mes = $data["mes"];
        }
        $mesReferencia = date($ano . '-' . $mes); // Formato 'AAAA-MM'

        $contador = 0;

        foreach ($socios as $socio) {
            // Verificar se já existe uma mensalidade para o mês atual
            $mensalidadeExistente = Mensalidade::where('usuario_id', $socio->id)
                ->where('mes_referencia', $mesReferencia)
                ->first();

            if (!$mensalidadeExistente) {
                // Gerar a mensalidade
                Mensalidade::create([
                    'usuario_id' => $socio->id,
                    'mes_referencia' => $mesReferencia,
                ]);
                $contador++;
            }
        }
        if ($contador > 0) {
            return redirect()->route('mensalidades.index')
                ->with('success', 'Mensalidades do mes ' . $mesReferencia . ' geradas com sucesso para ' . $contador . ' sócio(s)!');
        } else {
            return redirect()->route('mensalidades.index')
                ->with('success', 'Nenhuma mensalidade gerada!');
        }
    }



    public function geraMensalidadesIndividual(Request $request)
    {
        $data = $request->all();

        $mes = date('m');
        $ano = date('Y');
        $quantidade = 1;
        $id = $data["id"];
        $socio = $data["socio"];

        if ($data["ano"]) {
            $ano = $data["ano"];
        }
        if ($data["mes"]) {
            $mes = $data["mes"];
        }
        if ($data["quantidade"]) {
            $quantidade = $data["quantidade"];
        }

        // Criar data no formato aaaa-mm
        $dataFormatada = sprintf("%04d-%02d", $ano, $mes);

        // Exibir resultado
        $mesReferencia = 'Data formatada: ' . $dataFormatada;

        // Criar objeto DateTime a partir da data formatada
        $data = new DateTime($dataFormatada);

        $contador = 0;

        for ($i = 1; $i <= $quantidade; $i++) {
            // Verificar se já existe uma mensalidade para o mês atual
            $mensalidadeExistente = Mensalidade::where('usuario_id', $id)
                ->where('mes_referencia', $data->format('Y-m'))
                ->first();

            if (!$mensalidadeExistente) {
                // Gerar a mensalidade
                Mensalidade::create([
                    'usuario_id' => $id,
                    'mes_referencia' => $data->format('Y-m'),
                ]);
                $contador++;
                // Adicionar 1 mes
                $data->add(new DateInterval('P1M'));
            }
        }
        if ($contador > 0) {
            return redirect()->route('mensalidades.index')
                ->with('success', $contador . ' Mensalidades geradas com sucesso para o sócio ' . $socio);
        } else {
            return redirect()->route('mensalidades.index')
                ->with('success', 'Nenhuma mensalidade gerada!');
        }
    }
}
