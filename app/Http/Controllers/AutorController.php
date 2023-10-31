<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{
    public function index()
    {
        $autors = DB::table('autors')->orderByRaw('nome') ->paginate(10);

        return view('autors.index', compact('autors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $autor = Autor::create($data);


        return redirect()->route('autors.index')
            ->with('success', 'Autor registrado com sucesso!');

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
    public function edit(Autor $autor)
    {
        return view('autors.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autor $autor)
    {
        $autor->update($request->all());

        return redirect()->route('autors.index')
            ->with('success', 'Autor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();

        return redirect()->route('autors.index')
        ->with('success', 'Autor excluido com sucesso!');
    }
}

