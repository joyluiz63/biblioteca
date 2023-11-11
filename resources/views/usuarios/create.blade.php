@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('usuarios.index') }}">Usuarios</a> ->Cadastro</p>
    </div>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="bg-light p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="text-center">CADASTRO DE USUARIOS/SÓCIOS</h1>
            <div class="row">
                <div class="col-sm-7 mb-3 text-center">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" required>
                </div>

                <div class="col-sm-2 mb-3 text-center">
                    <label for="nascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" name="nascimento" value="{{ old('nascimento') }}">
                </div>

                <div class="col-sm-3 mb-3 text-center">
                    <label for="cpf">CPF</label>
                    <input type="text" autocomplete="off" maxlength="14" class="form-control" id="cpf"
                        name="cpf" value="{{ old('cpf') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-3 text-center">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" name="rua" value="{{ old('rua') }}">
                </div>

                <div class="col-sm-2 mb-3 text-center">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero" value="{{ old('numero') }}">
                </div>

                <div class="col-sm-4 mb-3 text-center">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" name="complemento" value="{{ old('complemento') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-3 text-center">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">
                </div>

                <div class="col-sm-6 mb-3 text-center">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-3 text-center">
                    <label for="fone">Telefone(s)</label>
                    <input type="text" autocomplete="off" class="form-control" id="fone" name="fone"
                        value="{{ old('fone') }}">
                </div>

                <div class="col-sm-6 mb-4 text-center">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="row w-50 justify-center">
                <div class="col-sm-2 mb-2 text-center form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" role="switch" name="socio"
                        id="socio">
                    <label for="socio">Sócio</label>
                </div>

                <div class="col-sm-4 mb-3 text-center">
                    <label for="valor">Valor da Mensalidade</label>
                    <input type="text" class="form-control" name="valor" id="valor" value="{{ old('valor') }}">
                </div>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">CADASTRAR</button>
            </div>
        </div>
    </form>
    <script src="{{ asset('assets/js/mask.js') }}"></script>
@endsection
