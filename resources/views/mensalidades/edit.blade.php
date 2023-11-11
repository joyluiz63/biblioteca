@extends('layouts.master')

@section('content')
    <div class="d-inline-flex bg-body-dark text-white">
        <p class="h6"><a href="{{ route('mensalidades.index') }}">Sócios</a> ->Atualizar Mensalidades</p>
    </div>
    <form action="{{ route('mensalidades.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-light w-50 p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="h6 text-center">EDIÇÃO DE MENSALIDADE</h1>
            <div class="col-sm-12 mb-3 text-center">
                <label for="nome">Usuario</label>
                <input type="text" class="form-control" name="nome" required value="{{ $usuario->nome }}">
            </div>

            <div class="col-sm-12 mb-3 text-center">
                <label for="valor">Mensalidade Valor</label>
                <input type="text" class="form-control text-right" name="valor" required value="{{ $usuario->valor }}">
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">ATUALIZAR</button>
            </div>
        </div>
    </form>
@endsection
