@extends('layouts.master')

@section('content')

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
                            <a href="{{ route('emprestimos.edit', $emprestimo->id) }}" class="btn btn-sm btn-secondary">DEVOLVER</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $emprestimos->links() }}
@endsection
