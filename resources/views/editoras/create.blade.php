@extends('layouts.master')


@section('content')
    <form action="{{ route('editoras.store') }}" method="POST">
        @csrf

        <section class="vh-50 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Nova Editora</h2>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="nome"
                                            class="form-control @error('nome') is-invalid @enderror"
                                            value="{{ old('nome') }}">
                                        @error('nome')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Nome</label>
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
