@extends('layouts.master')


@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('emprestimos.index') }}">Emprestimos</a> ->Cadastro</p>
    </div>

    <form action="{{ route('emprestimos.store') }}" method="POST">
        @csrf

        <section class="vh-50 gradient-custom">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Registro de Emprestimo</h2>

                                    <div class="form-outline form-white mb-4">
                                        <label>Usuario</label>
                                        <select name="usuario_id" class="form-control" required>
                                            <option selected></option>
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}"> {{ $usuario->nome }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Livro(s)</label>
                                        <select name="livros[]" class="form-control" multiple>
                                            @foreach ($livros as $livro)
                                                <option value="{{ $livro->id }}" @selected(collect(old('livros'))->contains($livro->id))>
                                                    {{ $livro->titulo }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="form-outline form-white mb-4 col-sm-4">
                                        </div>
                                        <div class="form-outline form-white mb-4 col-sm-4">
                                            <input type="date" name="retirada" required class="form-control"
                                                value='<?php echo date('Y-m-d'); ?>'>
                                            <label class="form-label">Data da Retirada:</label>
                                        </div>

                                        <div class="form-outline form-white mb-4 col-sm-4">
                                            <input type="date" name="devolvera" required class="form-control"
                                                value="{{ old('devolvera') }}">
                                            <label class="form-label">Data da Devolução:</label>
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Cadastrar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>
@endsection
