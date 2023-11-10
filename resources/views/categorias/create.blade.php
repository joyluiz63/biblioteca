@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('categorias.index') }}">Categorias</a> ->Cadastro</p>
    </div>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div class="bg-light w-50 p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="h6 text-center">CADASTRO DE CATEGORIA</h1>
            <div class="col-sm-12 mb-3 text-center">
                <label for="nome">Categoria</label>
                <input type="text" class="form-control" name="nome" required>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">CADASTRAR</button>
            </div>
        </div>
    </form>
@endsection
