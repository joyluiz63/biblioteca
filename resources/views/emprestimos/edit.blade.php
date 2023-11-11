@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h6"><a href="{{ route('emprestimos.index') }}">Emprestimos</a> ->Devolução</p>
    </div>

    <form action="{{ route('emprestimos.update', ['emprestimo' => $emprestimos['id']]) }}" method="POST">
        @csrf
        @method('PUT')

        <section class="vh-50 gradient-custom">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-4 text-uppercase">Registro de Devolução do Usuário:
                                        {{ $usuario->nome }}</h2>


                                    <div class="mb-3 row">
                                        <label class="col-sm-6 col-form-label">Informe a data da Devolução</label>
                                        <div class="col-sm-6">
                                            <input type="date" name="devolvido" class="form-control" required value='<?php echo date("Y-m-d"); ?>'>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-6 col-form-label">Marque o(s) Livro(s)</label>
                                        <div class="col-sm-6">
                                            @foreach ($livros as $key => $livro)
                                                <div class="row mb-3 d-flex justify-end">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $livro->id }}" id="livro_id[]" name="livro_id[]">
                                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                                            {{ $livro->titulo }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-6 col-form-label">Retirado em</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="retirada" class="form-control"
                                                value="{{ date('d-m-Y', strtotime($emprestimos->retirada)) }}" readonly>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-6 col-form-label">Prazo estipulado</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="devolvera" class="form-control"
                                                value="{{ date('d-m-Y', strtotime($emprestimos->devolvera)) }}" readonly>
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Registrar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </form>
@endsection
