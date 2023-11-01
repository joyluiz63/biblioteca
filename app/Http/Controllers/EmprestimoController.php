<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Livro;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = DB::table('emprestimos')
        ->join('emprestimo_livro','emprestimos.id','=','emprestimo_livro.emprestimo_id')
        ->join('livros','emprestimo_livro.livro_id','=','livros.id')
        ->join('users','emprestimos.user_id','=','users.id')
        ->where('livros.emprestado', '=', 1)
        ->select('users.name','livros.titulo','emprestimos.id','emprestimos.retirada','emprestimos.devolvera')
        ->orderByRaw('emprestimos.retirada')
        ->paginate(10);

       //dd($emprestimos);

        return view('emprestimos.index', compact('emprestimos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')->orderByRaw('name')->get();
        $livros = DB::table('livros')
        ->orderByRaw('titulo')
        ->where('livros.emprestado', '=', 0)
        ->get();

        return view('emprestimos.create', compact('users','livros'));
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

        return redirect()->route('livros.index')
            ->with('success', 'Registro de emprestimo efetuado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //$livros = Livro::findOrFail($id);

        $editoras = DB::table('editoras')
        ->join('livros', 'editoras.id', '=', 'livros.editora_id')
        ->where('livros.id', '=', $id)
        ->get();

        $autors = DB::table('autors')
        ->rightJoin("autor_livro","autors.id","=","autor_livro.autor_id")
        ->rightJoin("livros","autor_livro.livro_id","=","livros.id")
        ->where("livros.id","=", $id)
        ->get();

        $categorias = DB::table('categorias')
        ->rightJoin("categoria_livro","categorias.id","=","categoria_livro.categoria_id")
        ->rightJoin("livros","categoria_livro.livro_id","=","livros.id")
        ->where("livros.id","=", $id)
        ->get();

        return view("livros.show", compact("livros", "editoras","autors", "categorias"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $emprestimos = Emprestimo::findOrFail($id);
        $livros = $emprestimos->livros;

        return view("emprestimos.edit", compact("emprestimos", "livros"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $data = $request->all();

        if (isset($data['devolvido'])) {
            Livro::where('id', $data['livro_id'])
            ->update(['emprestado' => 0]);

            return redirect()->route('livros.index')
            ->with('success', 'Devolução de Livro efetuada com sucesso!');

        } else{
            dd('Data nula');
        }

        //$livro = Livro::findOrFail($livro);
       // $livro-> update($data);

        // $livro->categorias()->sync($data['categorias']);
        // $livro->autors()->sync($data['autors']);



    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Livro $livro)
    // {
    //     $livro->delete();

    //     return redirect()->route('livros.index')
    //     ->with('success', 'Livro excluida com sucesso!');
    // }
}
