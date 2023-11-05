@extends('layouts.master')

@section('content')
    <section class="vh-50 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-10">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">{{ $livros->titulo }}</h2>

                                <div class="bg-white text-black">
                                    <label class="fw-bold">Editora: </label>
                                    @foreach ($editoras as $editora)
                                        <td>{{ $editora->nome }}</td>
                                    @endforeach
                                </div>

                                <div class="bg-white text-black">
                                    <label class="fw-bold">Autor(es): </label>
                                    @foreach ($autors as $autor)
                                        @if($autor->espirito == 0)
                                        <td>- {{ $autor->nome }}</td>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="bg-white text-black">
                                    <label class="fw-bold">Autor(es) Espiritual(ais): </label>
                                    @foreach ($autors as $autor)
                                    @if($autor->espirito == 1)
                                    <td>- {{ $autor->nome }}</td>
                                    @endif
                                    @endforeach
                                </div>

                                <div class="bg-white text-black">
                                    <label class="fw-bold">Categoria(s): </label>
                                    @foreach ($categorias as $categoria)
                                        <td>- {{ $categoria->nome }}</td>
                                    @endforeach
                                </div>

                                <div class=" row mt-4">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="{{ route('livros.edit', $livros->id) }}" class="btn btn-primary">EDITAR</a>
                                    </div>
                                    {{-- <div class="col-sm-4 mb-3 mb-sm-0">
                                        <form action="{{ route('livros.destroy', $livros->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger active"
                                                onclick="return confirm('Tem certeza que deseja excluir o registro?')">
                                                EXCLUIR
                                            </button>
                                        </form>
                                    </div> --}}
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <form>
                                            <input type="button" class="btn btn-secondary active" value="VOLTAR"
                                                onClick="history.go(-1)">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
