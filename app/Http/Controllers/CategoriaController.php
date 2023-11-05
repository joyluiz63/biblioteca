<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = DB::table("categorias")->orderBy("nome","asc")->paginate(10);

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $categoria = Categoria::create($data);


        return redirect()->route('categorias.index')
            ->with('success', 'Categoria registrada com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();

            return redirect()->route('categorias.index')
            ->with('success', 'Categoria excluido com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('categorias.index')
            ->with('success', 'A Categoria não pode ser excluida, pois pertence ao registro de livros');
        }
    }
}
