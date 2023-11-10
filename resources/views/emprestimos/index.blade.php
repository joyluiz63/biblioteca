@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h5"><a href="{{ route('emprestimos.index') }}">Registro de Livros Emprestados</a></p>
    </div>

    <table class="table  table-striped">
        <thead>
            <th>Usuario</th>
            <th>Livro</th>
            <th>Retirado em</th>
            <th>Prazo Previsto</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($emprestimos as $emprestimo)
                <tr>
                    <td>{{ $emprestimo->nome }}</td>
                    <td>{{ $emprestimo->titulo }}</td>
                    <td>{{ date('d-m-Y', strtotime($emprestimo->retirada)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($emprestimo->devolvera)) }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('emprestimos.edit', $emprestimo->id) }}"
                                class="btn btn-sm btn-secondary">DEVOLVER</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="bg-white px-2">
        {{ $emprestimos->links() }}
    </div>
@endsection
