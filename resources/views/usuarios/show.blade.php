@extends('layouts.master')

@section('content')

<div class="container bg-info-subtle mb-1 text-center">
    <p class="h3 text-center">{{ $nome }}<p>
    <p class="h5 text-center">Biblioteca -> Histórico</p>
</div>
    <table class="table  table-striped">
        <thead>
            <th>Livro</th>
            <th>Retirado em</th>
            <th>Devolução Prevista</th>
            <th>Devolução Efetiva</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            @if($usuario->devolvido == null) <tr class="table-danger"> @else <tr> @endif
                    <td>{{ $usuario->titulo }}</td>
                    <td>{{ date('d-m-Y', strtotime($usuario->retirada)) }} </td>
                    <td>{{ date('d-m-Y', strtotime($usuario->devolvera)) }} </td>

                    <td> @if ($usuario->devolvido != null) {{date('d-m-Y', strtotime($usuario->devolvido))}}
                         @else PENDENTE
                         @endif</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('emprestimos.edit', $usuario->emprestimo_id) }}" class="btn btn-sm btn-secondary me-2">DEVOLUÇÃO</a>

                            {{-- <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger active"
                                    onclick="return confirm('Tem certeza que deseja excluir o registro?')">
                                    EXCLUIR
                                </button>
                            </form> --}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
@endsection
