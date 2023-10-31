<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    public function index()
    {
        $livros = DB::table('livros')
        ->join('editoras','livros.editora_id','=','editoras.id')
        ->orderByRaw('titulo')
        ->paginate(10);
// dd($livros);
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = DB::table('categorias')->orderByRaw('nome')->get();
        $autors = DB::table('autors')->orderByRaw('nome')->get();
        $editoras = DB::table('editoras')->orderByRaw('nome')->get();

        return view('livros.create', compact('categorias','autors','editoras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data  = $request->all();
        $livro = $request->except(['autors', 'categorias']);
        // $categoria = $request->only(['categorias']);
        // $autor = $request->only(['autors']);


        $livro = Livro::create($livro);
        $livro->categorias()->sync($data['categorias']);
        $livro->autors()->sync($data['autors']);


        return redirect()->route('livros.index')
            ->with('success', 'Livro registrado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $livros = Livro::findOrFail($id);

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

        $livro = Livro::findOrFail($id);

        $editoras = Editora::all(['id', 'nome']);
        $autors = Autor::all(['id', 'nome']);
        $categorias = Categoria::all(['id', 'nome']);

        return view("livros.edit", compact("livro", "editoras","autors", "categorias"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $data = $request->all();
        // dd($data);

        $livro = Livro::findOrFail($livro);
        $livro-> update($data);

        $livro->categorias()->sync($data['categorias']);
        $livro->autors()->sync($data['autors']);

        return redirect()->route('livros.index')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();

        return redirect()->route('livros.index')
        ->with('success', 'Livro excluida com sucesso!');
    }
}
