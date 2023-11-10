<?php

namespace App\Http\Controllers;

use App\Models\Mensalidade;
use App\Models\Pagamento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensalidadeController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->search;
        if ($data) {

            $socios = DB::table("usuarios")
            ->where("usuarios.socio","=", "1")
            ->where("usuarios.nome","like", "%".$data."%")
            ->paginate(7);} else {

            $socios = DB::table("usuarios")
            ->where("usuarios.socio","=", "1")
            ->paginate(7);
        }

        return view("mensalidades.index", compact("socios"));
    }

    public function show(string $id)
    {
        $usuarios = DB::table('mensalidades')
            ->join('usuarios','usuarios.id','=','mensalidades.usuario_id')
            ->leftJoin('pagamentos','mensalidades.id','=','pagamentos.mensalidade_id')
            ->where('mensalidades.usuario_id','=', $id)
            ->select('usuarios.id as usuario_id', 'usuarios.nome','mensalidades.mes_referencia', 'pagamentos.valor' ,'pagamentos.pagamento as data')
            ->orderBy('mensalidades.mes_referencia','desc')
            ->paginate(5);

            $nome = Usuario::findOrFail($id);
            $nome = $nome->nome;
//dd($usuarios);
            return view('mensalidades.show', compact('usuarios', 'nome'));
    }

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


        return view('mensalidades.edit', compact('usuarios', 'usuarioId'));
    }

    public function update(Request $request, string $usuarioId)
    {
        $data = $request->all();
        //dump($usuarioId);
        //dump($data['pagamento'][2]);
          dd($data);

        // if(isset($data["pagamento"])) {
            $pagamento = array_merge($data['pagamento'], $data['mensalidade']);
            dd($pagamento);
            $pagamento = DB::table("pagamentos")
            ->whereIn("mensalidade_id", $data["mensalidade"])
            ->update($data);

            Mensalidade::whereIn('id', $data['mensalidade'])
            ->update(['status' => 1]);

            return redirect()->route('mensalidades.index')
            ->with('success', 'Pagamento efetuado com sucesso!');
        // } else {
        //     return redirect()->route('mensalidades.index')
        //     ->with('success', 'Informe o(s) valor(es) pago(s)');
        // }

    }

    public function create()
    {
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
        $mesReferencia = date($ano.'-'.$mes); // Formato 'AAAA-MM'

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
        if($contador > 0) {
        return redirect()->route('mensalidades.index')
        ->with('success', 'Mensalidades do mes '.$mesReferencia.' geradas com sucesso para '.$contador .' sócio(s)!');
        } else {
            return redirect()->route('mensalidades.index')
        ->with('success', 'Nenhuma mensalidade gerada!');

        }

    }
}

