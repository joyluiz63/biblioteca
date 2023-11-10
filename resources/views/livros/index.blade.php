@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <nav class="navbar">
            <p class="h5 text-white"><a href="{{ route('livros.index') }}">Livros</a></p>
            <form action="{{ route('livros.index') }}" method="GET" class="d-flex" role="search">
                <input class="form-input me-2" type="search" name="search" aria-label="Search">
                <button class="btn btn-outline-primary active" type="submit">Busca</button>
            </form>
        </nav>
    </div>

    <table class="table  table-striped">
        <thead>
            <th>Código</th>
            <th>Titulo</th>
            <th>Editora</th>
            <th>Emprestado</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
                @if ($livro->emprestado == 1)
                    <tr class="table-danger">
                    @else
                    <tr>
                @endif
                <td>{{ $livro->id }}</td>
                <td>{{ $livro->titulo }}</td>
                <td>{{ $livro->nome }}</td>
                <td>{{ $livro->emprestado == 0 ? '' : 'Sim' }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('livros.show', $livro->id) }}" class="btn btn-sm btn-secondary">Visualizar</a>
                    </div>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="bg-white px-2">
        {{ $livros->links() }}
    </div>
@endsection
