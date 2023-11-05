<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$editoras = Editora::paginate(10);

        $editoras = DB::table("editoras")->orderBy("nome","asc")->paginate(10);

        return view('editoras.index', compact('editoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('editoras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $editora = Editora::create($data);


        return redirect()->route('editoras.index')
            ->with('success', 'Editora registrada com sucesso!');

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
    public function edit(Editora $editora)
    {
        return view('editoras.edit', compact('editora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Editora $editora)
    {
        $editora->update($request->all());

        return redirect()->route('editoras.index')
            ->with('success', 'Editora atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editora $editora)
    {
        try {
            $editora->delete();
            return redirect()->route('editoras.index')
            ->with('success', 'Editora excluida com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('editoras.index')
            ->with('success', 'A editora não pode ser excluida, pois pertence ao registro de livros');
        }


    }
}
