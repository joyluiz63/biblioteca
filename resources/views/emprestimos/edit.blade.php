@extends('layouts.master')


@section('content')
    <form action="{{ route('emprestimos.update', ['emprestimo' => $emprestimos['id']]) }}" method="POST">
        @csrf
        @method('PUT')

        <section class="vh-50 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-4 text-uppercase">Registro de Devolução</h2>

                                    <div class="mb-3 row">
                                        <label class="col-sm-6 col-form-label">Informe a data da Devolução</label>
                                        <div class="col-sm-6">
                                            <input type="date" name="devolvido" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">


                                            @foreach ($livros as $key=>$livro)

                                                <div class="col-sm-4 form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $livro->id }}" id="livro_id[]" name="livro_id[]">
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        {{ $livro->titulo }}
                                                    </label>
                                                    
                                                </div>
                                            @endforeach

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
