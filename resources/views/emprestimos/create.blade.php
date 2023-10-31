@extends('layouts.master')


@section('content')
    <form action="{{ route('emprestimos.store') }}" method="POST">
        @csrf

        <section class="vh-50 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Registro de Emprestimo</h2>

                                    <div class="form-outline form-white mb-4">
                                        <label>Usuario</label>
                                        <select name="user_id" class="form-control @error('users') is-invalid @enderror">
                                            <option selected>Selecione o Usuário</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('users')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Livro(s)</label>
                                        <select name="livros[]" class="form-control @error('livros.*') is-invalid @enderror"
                                            multiple>
                                            @foreach ($livros as $livro)
                                                <option value="{{ $livro->id }}"> {{ $livro->id . ' - ' . $livro->titulo }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('livros.*')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="date" name="retirada"
                                            class="form-control @error('retirada') is-invalid @enderror"
                                            value="{{ old('retirada') }}">
                                        @error('retirada')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Data da Retirada:</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="date" name="devolvera"
                                            class="form-control @error('devolvera') is-invalid @enderror"
                                            value="{{ old('devolvera') }}">
                                        @error('devolvera')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Data da Devolução:</label>
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
