@extends('layouts.master')

@section('content')

    <table class="table  table-striped">
        <thead>
            <th>Titulo</th>
            <th>Editora</th>
            <th>Emprestado</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
                <tr>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->nome }}</td>
                    <td>{{ $livro->emprestado == 0 ? 'Não' : 'Sim' }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('livros.show', $livro->id) }}" class="btn btn-sm btn-secondary">VER</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $livros->links() }}
@endsection
