@extends('layouts.master')

@section('content')
    <div class="d-inline-flex bg-body-dark text-white">
        <p class="h6"><a href="{{ route('mensalidades.index') }}">Sócios</a> ->Gerar Mensalidades</p>
    </div>

    <form action="{{ route('mensalidades.geraMensalidades') }}" method="POST">
        @csrf

        <div class="bg-light w-50 p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="text-center">GERAR MENSALIDADES PARA SÓCIOS</h1>
            <div class="row m-4">
                <div class="col-sm-6 mb-3 text-center">
                    <label for="nome">Informe o mês com 2 dígitos</label>
                    <input type="text" class="form-control" name="mes" minlength="2" maxlength="2">
                </div>

                <div class="col-sm-6 mb-3 text-center">
                    <label for="nome">Informe o ano com 4 dígitos</label>
                    <input type="text" class="form-control" name="ano" minlength="4" maxlength="4">
                </div>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">GERAR</button>
            </div>
            <div class="card bg-secondary mt-2">
                <div class="card-body">
                    <h5 class="text-center">Atenção:</h5>
                    <p class="card-text">Informando o ano e o mês, ao clicar no borão GERAR será gerada uma mensalidade do
                        periodo informado,
                        para cada sócio cadastrado (se já não hover mensalidade gerada).
                        Se nada for informado, será gerada uma mensalidade para o mês atual,
                        para cada sócio cadastrado (se já não hover mensalidade gerada).</p>
                </div>
            </div>

        </div>
    </form>
@endsection
