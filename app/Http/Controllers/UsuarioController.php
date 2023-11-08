<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->search;
        if ($data) {
            $usuarios = DB::table("usuarios")
            ->where("nome","like", "%".$data."%")
            ->paginate(10);
        } else {
            $usuarios = DB::table("usuarios")->orderBy("nome","asc")->paginate(10);
        }

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $usuario = Usuario::create($data);


        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario registrado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuarios = DB::table('usuarios')
            ->join('emprestimos','usuarios.id','=','emprestimos.usuario_id')
            ->join('emprestimo_livro','emprestimos.id','=','emprestimo_livro.emprestimo_id')
            ->join('livros','emprestimo_livro.livro_id','=','livros.id')
            ->where('usuarios.id','=', $id)
            ->select('usuarios.nome','livros.*', 'emprestimos.id as emprestimo_id' ,'emprestimos.retirada', 'emprestimos.devolvera', 'emprestimo_livro.devolvido')
            ->paginate(10);
            //dd($usuarios);

            $nome = Usuario::findOrFail($id);
            $nome = $nome->nome;

            return view('usuarios.show', compact('usuarios', 'nome'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        if (!$request['socio']) $request['socio'] = 0;

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        // $usuario->delete();

        // return redirect()->route('usuarios.index')
        // ->with('success', 'Usuario excluido com sucesso!');
    }
}
