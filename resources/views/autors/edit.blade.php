@extends('layouts.master')


@section('content')
    <form action="{{ route('autors.update', $autor) }}" method="POST">
        @csrf
        @method("PUT")

        <section class="vh-50 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Atualização de Autor</h2>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="nome"
                                            class="form-control @error('nome') is-invalid @enderror"
                                            value="{{ isset($autor->nome) ? $autor->nome : old('nome') }}">
                                        @error('nome')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Nome</label>
                                    </div>

                                    <div class="form-check">
                                        <label class="mx-4">Autor Espiritual</label>
                                        <div class="form-check form-check-inline mb-4">
                                            <input class="form-check-input" type="radio" id="espirito"
                                                name="espirito" value="0" @checked(old("0", $autor->espirito == "0"))>
                                            <label class="form-check-label" for="espirito">Não</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="espirito"
                                            name="espirito" value="1" @checked(old("1", $autor->espirito == "1"))>
                                            <label class="form-check-label" for="espirito">Sim</label>
                                        </div>
                                    </div>


                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Atualizar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </form>
@endsection
