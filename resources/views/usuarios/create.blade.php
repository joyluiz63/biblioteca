@extends('layouts.master')


@section('content')
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <section class="vh-50 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Novo Usuario</h2>

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

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="cpf"
                                            class="form-control @error('cpf') is-invalid @enderror"
                                            value="{{ old('cpf') }}">
                                        @error('cpf')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">CPF</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="rua"
                                            class="form-control @error('rua') is-invalid @enderror"
                                            value="{{ old('rua') }}">
                                        @error('rua')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Rua</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="numero"
                                            class="form-control @error('numero') is-invalid @enderror"
                                            value="{{ old('numero') }}">
                                        @error('numero')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Numero</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="complemento"
                                            class="form-control @error('complemento') is-invalid @enderror"
                                            value="{{ old('complemento') }}">
                                        @error('complemento')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Complemento</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="bairro"
                                            class="form-control @error('bairro') is-invalid @enderror"
                                            value="{{ old('bairro') }}">
                                        @error('bairro')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Bairro</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="cidade"
                                            class="form-control @error('cidade') is-invalid @enderror"
                                            value="{{ old('cidade') }}">
                                        @error('cidade')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Cidade</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="fone"
                                            class="form-control @error('fone') is-invalid @enderror"
                                            value="{{ old('fone') }}">
                                        @error('fone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Telefone(s)</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Email</label>
                                    </div>

                                    <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="socio" name="socio">
                                        <label class="form-check-label">
                                          Socio
                                        </label>
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
