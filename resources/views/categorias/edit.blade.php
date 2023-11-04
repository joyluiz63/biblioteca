@extends('layouts.master')


@section('content')
    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-light w-50 p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="text-center">ATUALIZAÇÃO DE CATEGORIA</h1>
            <div class="col-sm-12 mb-3 text-center">
                <label for="nome">Categoria</label>
                <input type="text" class="form-control" name="nome" value="{{ isset($categoria->nome) ? $categoria->nome : old('nome') }}">>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">ATUALIZAR</button>
            </div>
        </div>


    </form>
@endsection
