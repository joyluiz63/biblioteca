@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('livros.index') }}">Livros</a> ->Cadastro</p>
    </div>

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf

        <div class="bg-light w-60 p-2 mt-2 container-fluid justify-center border border-dark">
            <h1 class="h6 text-center">CADASTRO DE LIVRO</h1>

            <div class="row">
                <div class="col-sm-7 mb-3 text-center">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required>
                </div>

                <div class="form-outline col-sm-5 mb-3 text-center">
                    <label>Editora</label>
                    <select name="editora_id" class="form-control">
                        <option selected>Selecione a Editora</option>
                        @foreach ($editoras as $editora)
                            <option value="{{ $editora->id }}"> {{ $editora->nome }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-check col-sm-4 mb-3 text-center">
                    <label>Autor(es) Encarnado</label>
                    <select name="autors[]" class="form-control" multiple>
                        @foreach ($autors1 as $autor)
                            <option value="{{ $autor->id }}"> {{ $autor->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-outline col-sm-4 mb-3 text-center">
                    <label>Autor(es) Espiritual</label>
                    <select name="autors[]" class="form-control" multiple>
                        @foreach ($autors2 as $autor)
                            <option value="{{ $autor->id }}"> {{ $autor->nome }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-outline col-sm-4 mb-3 text-center">
                    <label>Categoria(s)</label>
                    <select name="categorias[]" class="form-control" multiple>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"> {{ $categoria->nome }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">CADASTRAR</button>
            </div>
        </div>
    </form>
@endsection
