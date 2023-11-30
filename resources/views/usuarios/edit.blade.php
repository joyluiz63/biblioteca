@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('usuarios.index') }}">Usuarios</a> ->Edição</p>
    </div>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="bg-light p-2 mt-6 container-fluid justify-center border border-dark">
            <h1 class="text-center">EDIÇÃO DE USUARIOS/SÓCIOS</h1>
            <div class="row">
                <div class="col-sm-7 mb-3 text-center">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control" name="nome"
                        value="{{ isset($usuario->nome) ? $usuario->nome : old('nome') }}">
                </div>

                <div class="col-sm-2 mb-3 text-center">
                    <label for="nascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" name="nascimento"
                        value="{{ isset($usuario->nascimento) ? $usuario->nascimento : old('nascimento') }}">
                </div>

                <div class="col-sm-3 mb-3 text-center">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf"
                        value="{{ isset($usuario->cpf) ? $usuario->cpf : old('cpf') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-3 text-center">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" name="rua"
                        value="{{ isset($usuario->rua) ? $usuario->rua : old('rua') }}">
                </div>

                <div class="col-sm-2 mb-3 text-center">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero"
                        value="{{ isset($usuario->numero) ? $usuario->numero : old('numero') }}">
                </div>

                <div class="col-sm-4 mb-3 text-center">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" name="complemento"
                        value="{{ isset($usuario->complemento) ? $usuario->complemento : old('complemento') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-3 text-center">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro"
                        value="{{ isset($usuario->bairro) ? $usuario->bairro : old('bairro') }}">
                </div>

                <div class="col-sm-6 mb-3 text-center">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade"
                        value="{{ isset($usuario->cidade) ? $usuario->cidade : old('cidade') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-3 text-center">
                    <label for="fone">Telefone(s)</label>
                    <input type="text" class="form-control" id="fone" name="fone"
                        value="{{ isset($usuario->fone) ? $usuario->fone : old('fone') }}">
                </div>

                <div class="col-sm-6 mb-4 text-center">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"
                        value="{{ isset($usuario->email) ? $usuario->email : old('email') }}">
                </div>
            </div>

            <div class="row  justify-end">
                <div class="col-sm-2 mb-2 text-center form-check">
                    <input class="form-check-input" type="checkbox" role="switch" name="socio" value="1"
                        @if ($usuario->socio) checked @endif>
                    <label for="socio">Sócio</label>
                </div>

                <div class="col-sm-4 mb-3 text-center">
                    <label for="valor">Valor da Mensalidade</label>
                    <input type="text" class="form-control" id="valor" name="valor"
                        value="{{ isset($usuario->valor) ? $usuario->valor : old('valor') }}">
                </div>
            </div>

            <div class="flex justify-center">
                <button class="btn btn-secondary active px-5" type="submit">ATUALIZAR</button>
            </div>
        </div>

    </form>
@endsection
