@extends('layouts.master')

@section('content')
    <div class="d-inline-flex bg-body-dark text-white">
        <p class="h6"><a href="{{ route('mensalidades.index') }}">Sócios</a> ->Gerar Mensalidades</p>
    </div>

    <form action="{{ route('mensalidades.geraMensalidadesIndividual') }}" method="POST">
        @csrf

        <div class="bg-light w-50 p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="text-center">GERAR MENSALIDADES PARA SÓCIO</h1>
            <div class="row m-4">
                <label for="socio">Nome do Socio</label>
                <input type="text" class="form-control" name="id" value="{{ $socio->id }}" hidden>
                <input type="text" class="form-control" name="socio" value="{{ $socio->nome }}" readonly>
            </div>

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
                <div class="col-sm-6 mb-3 text-center">
                    <label>Quantas meses de mensalidade?</label>
                    <input type="number" class="form-control" name="quantidade">
                </div>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">GERAR</button>
            </div>
            <div class="card bg-secondary mt-2">
                <div class="card-body">
                    <h5 class="text-center">Atenção:</h5>
                    <p class="text-center">
                        Obrigatório informar o mês e o ano.
                    </p>
                    <p class="text-cente">
                        O sistema irá gerar a(s) mensalidade(s), na quantidade informada
                        (se nada informado em quantidade, gerará somente uma mensalidade para o periodo informado)
                        se já não hover mensalidade gerada.
                    </p>
                </div>
            </div>

        </div>
    </form>
@endsection
