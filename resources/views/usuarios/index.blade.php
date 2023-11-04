@extends('layouts.master')

@section('content')

    <table class="table  table-striped">
        <thead>
            <th>Usuário</th>
            <th>Telefone(s)</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->fone }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{-- {{ route('usuarios.edit', $usuario->id) }} --}}" class="btn btn-sm btn-secondary">EDITAR</a>
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
