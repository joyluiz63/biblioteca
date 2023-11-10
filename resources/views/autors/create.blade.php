@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('autors.index') }}">Autores</a> ->Cadastro</p>
    </div>
    <form action="{{ route('autors.store') }}" method="POST">
        @csrf

        <div class="bg-light w-50 p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="h6 text-center">CADASTRO DE AUTOR</h1>

            <div class="col-sm-12 mb-3 text-center">
                <label for="nome">Autor</label>
                <input type="text" class="form-control" name="nome" required>
            </div>

            <div class="form-check">
                <label class="mx-4">Autor Espiritual</label>
                <div class="form-check form-check-inline mb-4">
                    <input class="form-check-input" type="radio" id="espirito" name="espirito" value="0" checked>
                    <label class="form-check-label" for="espirito">Não</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="espirito" name="espirito" value="1">
                    <label class="form-check-label" for="espirito">Sim</label>
                </div>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">CADASTRAR</button>
            </div>
        </div>
    </form>
@endsection
