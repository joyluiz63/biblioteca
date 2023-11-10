@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('livros.index') }}">Livros</a> ->Edição</p>
    </div>

    <form action="{{ route('livros.update', ['livro' => $livro['id']]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-light w-60 p-2 mt-2 container-fluid justify-center border border-dark">
            <h1 class="h6 text-center">EDIÇÃO DE LIVRO</h1>

            <div class="row">
                <div class="col-sm-7 mb-3 text-center">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" name="titulo"
                        value="{{ isset($livro->titulo) ? $livro->titulo : old('titulo') }}" required>
                </div>

                <div class="form-outline col-sm-5 mb-3 text-center">
                    <label>Editora</label>
                    <select name="editora_id" class="form-control">
                        @foreach ($editoras as $editora)
                            <option value="{{ $editora->id }}"
                                {{ $editora->id == old('editora_id', $livro->editora_id) ? 'selected' : '' }}>
                                {{ $editora->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-outline col-sm-6 mb-3 text-center">
                    <label>Autor(es)</label>
                    <select name="autors[]" class="form-control" multiple>
                        @foreach ($autors as $autor)
                            <option value="{{ $autor->id }}" @if ($livro->autors->contains($autor)) selected @endif>
                                {{ $autor->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-outline col-sm-6 mb-3 text-center">
                    <label>Categoria(s)</label>
                    <select name="categorias[]" class="form-control" multiple>
                        @foreach ($categorias as $c)
                            <option value="{{ $c->id }}" @if ($livro->categorias->contains($c)) selected @endif>
                                {{ $c->nome }}
                            </option>
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
