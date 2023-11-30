@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('livros.index') }}">Livros</a> ->Cadastro</p>
    </div>

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf

        <div class="bg-light p-2 mt-2 col-sm-10 container-fluid justify-center border border-dark">
            <h1 class="h6 text-center">CADASTRO DE LIVRO</h1>

            <div class="row">
                <div class="col-sm-12 mb-3 px-4 text-center">
                    <label for="titulo">*Título do Livro</label>
                    <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required>
                </div>
            </div>

            <div class="row gap-4 px-4 mx-4">
                <div class="form-outline col-sm-5 mb-3 text-center border border-dark">
                    <label>*Editora</label>
                    <select name="editora_id" class="selectpicker" data-width="100%"
                        data-title="Nada selecionado">
                        <option selected></option>
                        @foreach ($editoras as $editora)
                            <option class="bg-secondar" value="{{ $editora->id }}"
                                @selected(old('editora_id') == $editora->id)> {{ $editora->nome }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-outline col-sm-6 mb-3 text-center border border-dark">
                    <p>*Categoria(s)</p>
                    <select name="categorias[]" class="selectpicker" data-width="100%"
                        multiple data-title="Nada selecionado">
                        @foreach ($categorias as $categoria)
                            <option class="bg-secondary" value="{{ $categoria->id }}"
                                @selected(collect(old('categorias'))->contains($categoria->id))> {{ $categoria->nome }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row gap-4 px-4 mx-4">
                <div class="form-check col-sm-6 mb-3 text-center border border-dark">
                    <p>*Autor(es) Encarnado</p>
                    <select name="autors[]" class="selectpicker" data-width="100%"
                        multiple data-title="Nada selecionado">
                        @foreach ($autors1 as $autor)
                            <option class="bg-secondary" value="{{ $autor->id }}"
                                @selected(collect(old('autors'))->contains($autor->id))> {{ $autor->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-outline col-sm-5 mb-3 text-center border border-dark">
                    <p>Autor(es) Espiritual</p>
                    <select name="autors[]" class="selectpicker"
                        data-width="100%" multiple data-title="Nada selecionado">
                        @foreach ($autors2 as $autor)
                            <option class="bg-secondary" value="{{ $autor->id }}"
                                @selected(collect(old('autors'))->contains($autor->id))> {{ $autor->nome }} </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="flex justify-center">
                <button class="btn btn-primary active px-5" type="submit">CADASTRAR</button>
            </div>
        </div>
    </form>
@endsection
