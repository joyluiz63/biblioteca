@extends('layouts.master')


@section('content')
    <form action="{{ route('receber_pagamento') }}" method="POST">
        @csrf


        <section class="vh-50 gradient-custom">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-4 text-uppercase">Usuário:
                                        {{ $usuarios[0]->nome }}</h2>

                                    <div class="mb-3 row">
                                        <label class="col-sm-8 col-form-label">Informe a data do Pagamento</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="pagamento" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <table class="table table-striped">
                                            <thead>

                                                <th>Mês Referencia</th>
                                                <th>Valor Acordado</th>
                                                <th>Valor pago</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($usuarios as $key => $usuario)
                                                    <tr>
                                                        <input type="text" name="mensalidade[{{$key}}][id]" value="{{ $usuario->mensalidade_id}}" hidden>
                                                        <td>{{ $usuario->mes_referencia }} </td>
                                                        <td>R$ {{ $usuario->valor }} </td>
                                                        <td><input type="number" step="0.01" min="0.01" name="mensalidade[{{$key}}][valor]" {{-- value="{{ isset($usuario->valor) ? $usuario->valor : old('valor') }}" --}}> </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="flex justify-center">
                                        <button class="btn btn-secondary active btn-lg px-5" type="submit">Registrar Pagamento</button>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>


    </form>
@endsection
