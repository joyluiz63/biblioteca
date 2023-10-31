@extends('layouts.master')


@section('content')
    <form action="{{ route('livros.update', ['livro' => $livro['id']]) }}" method="POST">
        @csrf
        @method('PUT')
        <section class="vh-50 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Atualização de Livro</h2>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="titulo"
                                            class="form-control @error('nome') is-invalid @enderror"
                                            value="{{ isset($livro->titulo) ? $livro->titulo : old('titulo') }}">
                                        @error('titulo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-label">Título do Livro</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <select name="editora_id" id="" class="form-control">
                                            @foreach ($editoras as $editora)
                                            <option value="{{ $editora->id }}" {{ $editora->id == old('editora_id', $livro->editora_id)  ? "selected" : "" }}>
                                                {{ $editora->nome }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Editora</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <select name="autors[]" id="" class="form-control" multiple>
                                            @foreach ($autors as $autor)
                                                <option value="{{ $autor->id }}"
                                                    @if ($livro->autors->contains($autor)) selected @endif> {{ $autor->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Autor(es)</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <select name="categorias[]" id="" class="form-control" multiple>
                                            @foreach ($categorias as $c)
                                                <option value="{{ $c->id }}"
                                                    @if ($livro->categorias->contains($c)) selected @endif> {{ $c->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Categoria(s)</label>
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
