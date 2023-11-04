@extends('layouts.master')


@section('content')
    <form action="{{ route('livros.store') }}" method="POST">
        @csrf

        <section class="vh-50 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Novo Livro</h2>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="titulo"
                                            class="form-control @error('titulo') is-invalid @enderror"
                                            value="{{ old('titulo') }}">
                                        @error('titulo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Titulo</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Editora</label>
                                        <select name="editora_id" class="form-control @error('editoras') is-invalid @enderror">
                                            <option selected>Selecione a Editora</option>
                                            @foreach ($editoras as $editora)
                                                <option value="{{ $editora->id}}"> {{$editora->nome }} </option>
                                            @endforeach
                                        </select>
                                        @error('editoras')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Autor(es)</label>
                                        <select name="autors[]" class="form-control @error('autors.*') is-invalid @enderror" multiple>
                                            @foreach ($autors as $autor)
                                                <option value="{{ $autor->id}}"> {{$autor->nome }} </option>
                                            @endforeach
                                        </select>
                                        @error('autors.*')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label>Categoria(s)</label>
                                        <select name="categorias[]" class="form-control @error('categorias.*') is-invalid @enderror" multiple>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id}}"> {{$categoria->nome }} </option>
                                            @endforeach
                                        </select>
                                        @error('categories.*')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
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
