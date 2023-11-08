@extends('layouts.master')


@section('content')
    <form action="{{ route('autors.update', $autor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-light w-50 p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="text-center">ATUALIZAÇÃO DE AUTOR</h1>
            <div class="col-sm-12 mb-3 text-center">
                <label for="nome">Autor</label>
                <input type="text" class="form-control" name="nome" value="{{ isset($autor->nome) ? $autor->nome : old('nome') }}">
            </div>

            <div class="form-check">
                <label class="mx-4">Autor Espiritual</label>
                <div class="form-check form-check-inline mb-4">
                    <input class="form-check-input" type="radio" id="espirito"
                        name="espirito" value="0" {{ old('espirito', $autor->espirito) == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="espirito">Não</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="espirito"
                    name="espirito" value="1" {{ old('espirito', $autor->espirito) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="espirito">Sim</label>
                </div>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">CADASTRAR</button>
            </div>
        </div>


    </form>
@endsection
