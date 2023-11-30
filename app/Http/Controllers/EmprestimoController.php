<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Livro;
use App\Models\Usuario;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = DB::table('emprestimos')
            ->join('emprestimo_livro', 'emprestimos.id', '=', 'emprestimo_livro.emprestimo_id')
            ->join('usuarios', 'emprestimos.usuario_id', '=', 'usuarios.id')
            ->join('livros', 'emprestimo_livro.livro_id', '=', 'livros.id')
            ->where('emprestimo_livro.devolvido', '=', null)
            ->select('usuarios.nome', 'livros.titulo', 'emprestimos.id', 'emprestimos.retirada', 'emprestimos.devolvera')
            ->orderByRaw('emprestimos.retirada')
            ->paginate(7);

        //dd($emprestimos);

        return view('emprestimos.index', compact('emprestimos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = DB::table('usuarios')->orderByRaw('nome')->get();
        $livros = DB::table('livros')
            ->orderByRaw('titulo')
            ->where('livros.emprestado', '=', 0)
            ->get();

        return view('emprestimos.create', compact('usuarios', 'livros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data  = $request->all();

        $emprestimo = $request->except(['livros']);

        $emprestimo = Emprestimo::create($emprestimo);
        $emprestimo->livros()->sync($data['livros']);
        // ALTERA STATUS EMPRESTADO NA TABELA LIVROS
        Livro::whereIn('id', $data['livros'])
            ->update(['emprestado' => 1]);

        return redirect()->route('emprestimos.index')
            ->with('success', 'Registro de emprestimo efetuado com sucesso!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $emprestimos = Emprestimo::findOrFail($id);
        $livros = $emprestimos->livros;
        //dd($livros);
        $livros = DB::table('livros')
            ->join('emprestimo_livro', 'livros.id', '=', 'emprestimo_livro.livro_id')
            ->where('emprestimo_livro.emprestimo_id', '=', $id)
            ->where('emprestimo_livro.devolvido', '=', null)
            ->get();

        $usuario = Usuario::findOrfail($emprestimos->usuario_id);

        return view("emprestimos.edit", compact("emprestimos", "livros", "usuario"));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $emprestimo)
    {
        $data = $request->all();
        //dd($data);

        if (isset($data["livro_id"])) {
            $emprestimo = DB::table("emprestimo_livro")
                ->whereIn("livro_id", $data["livro_id"])
                ->update(["devolvido" => $data['devolvido']]);

            Livro::whereIn('id', $data['livro_id'])
                ->update(['emprestado' => 0]);

            return redirect()->route('emprestimos.index')
                ->with('success', 'Devolução de Livro efetuada com sucesso!');
        } else {
            return redirect()->route('emprestimos.index')
                ->with('success', 'Assinale o(s) livro(s) a serem devolvido!');
        }
    }
}
