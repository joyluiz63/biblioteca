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
        ->join('users','emprestimos.user_id','=','users.id')
        ->join('livros','emprestimo_livro.livro_id','=','livros.id')
        //->where('livros.emprestado', '=', 1)
        ->where('emprestimo_livro.devolvido','=', null)
        ->select('users.name', 'livros.titulo','emprestimos.id','emprestimos.retirada','emprestimos.devolvera')
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

        return redirect()->route('emprestimos.index')
            ->with('success', 'Registro de emprestimo efetuado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //$livros = Livro::findOrFail($id);

        // $editoras = DB::table('editoras')
        // ->join('livros', 'editoras.id', '=', 'livros.editora_id')
        // ->where('livros.id', '=', $id)
        // ->get();

        // $autors = DB::table('autors')
        // ->rightJoin("autor_livro","autors.id","=","autor_livro.autor_id")
        // ->rightJoin("livros","autor_livro.livro_id","=","livros.id")
        // ->where("livros.id","=", $id)
        // ->get();

        // $categorias = DB::table('categorias')
        // ->rightJoin("categoria_livro","categorias.id","=","categoria_livro.categoria_id")
        // ->rightJoin("livros","categoria_livro.livro_id","=","livros.id")
        // ->where("livros.id","=", $id)
        // ->get();

        // return view("livros.show", compact("livros", "editoras","autors", "categorias"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $emprestimos = Emprestimo::findOrFail($id);
        $livros = $emprestimos->livros;
        //dd($livros);
        $livros= $livros->whereIn('emprestado', 1);

        return view("emprestimos.edit", compact("emprestimos", "livros"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $emprestimo)
    {
        $data = $request->all();
         //dd($data);

        if(isset($data["livro_id"])) {
            $emprestimo = DB::table("emprestimo_livro")
            ->whereIn("livro_id", $data["livro_id"])
            ->update(["devolvido"=> $data['devolvido']]);

            Livro::whereIn('id', $data['livro_id'])
            ->update(['emprestado' => 0]);

            return redirect()->route('emprestimos.index')
            ->with('success', 'Devolução de Livro efetuada com sucesso!');
        } else {
            return redirect()->route('emprestimos.index')
            ->with('success', 'Assinale o(s) livro(s) a serem devolvido!');
        }

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
