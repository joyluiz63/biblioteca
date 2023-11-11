<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Else_;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->search;
        if($data) {
            $livros = DB::table('livros')
            ->join('editoras','livros.editora_id','=','editoras.id')
            ->select('livros.id as id', 'livros.titulo', 'editoras.nome', 'livros.emprestado'  )
            ->where("titulo","like", "%".$data."%")
            ->paginate(7);
        } else {
            $livros = DB::table('livros')
            ->join('editoras','livros.editora_id','=','editoras.id')
            ->select('livros.id as id', 'livros.titulo', 'editoras.nome', 'livros.emprestado'  )
            ->orderByRaw('titulo')
            ->paginate(7);
        }
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = DB::table('categorias')->orderByRaw('nome')->get();
        $autors1 = DB::table('autors')->orderByRaw('nome')->where('espirito', '=', '0') ->get();
        $autors2 = DB::table('autors')->orderByRaw('nome')->where('espirito', '=', '1') ->get();
        $editoras = DB::table('editoras')->orderByRaw('nome')->get();

        return view('livros.create', compact('categorias','autors1','autors2','editoras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data  = $request->all();
        if( !$request['autors'] || !$request['categorias'] ) {
            return Redirect::back()->withInput()
                ->with('success', 'Todos os campos com * são de preenchimento obrigatório!');
        } else {
            $livro = $request->except(['autors', 'categorias']);


            $livro = Livro::create($livro);
            $livro->categorias()->sync($data['categorias']);
            $livro->autors()->sync($data['autors']);
            $salvo = $livro->id;

            return redirect()->route('livros.index')
                ->with('success', 'Livro registrado com sucesso!');
        }

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

        $editoras = Editora::orderby('nome')->get();
        $autors = Autor::orderby('nome')->get();
        $categorias = Categoria::orderby('nome')->get();

        return view("livros.edit", compact("livro", "editoras","autors", "categorias"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $data = $request->all();
        // dd($data);
        if( !$request['autors'] || !$request['categorias'] ) {
            return Redirect::back()->withInput()
                ->with('success', 'Todos os campos com * são de preenchimento obrigatório!');
        } else {
            $livro = Livro::findOrFail($livro);
            $livro-> update($data);

            $livro->categorias()->sync($data['categorias']);
            $livro->autors()->sync($data['autors']);

            return redirect()->route('livros.index')
                ->with('success', 'Livro atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        try {
            $livro->autors()-> detach();
            $livro->categorias()->detach();
            $livro->delete();

            return redirect()->route('livros.index')
            ->with('success', 'Livro excluido com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('livros.index')
            ->with('success', 'O livro não pode ser excluido, pois pertence ao registro de emprestimos ');
        }
    }
}
