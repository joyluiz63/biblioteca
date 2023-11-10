@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <nav class="navbar">
            <p class="h5 text-white"><a href="{{ route('usuarios.index') }}">Usuarios</a></p>
            <form action="{{ route('usuarios.index') }}" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="search" aria-label="Search">
                <button class="btn btn-outline-primary active" type="submit">Busca</button>
            </form>
        </nav>
    </div>

    <table class="table  table-striped">
        <thead>
            <th>Usuário</th>
            <th>Nascimento</th>
            <th>Telefone(s)</th>
            <th>Sócio</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                @if ($usuario->socio == 1)
                    <tr class="table-success">
                    @else
                    <tr>
                @endif
                <td>{{ $usuario->nome }}</td>
                <td>{{ date('d-m-Y', strtotime($usuario->nascimento)) }} </td>
                <td>{{ $usuario->fone }}</td>
                <td>{{ $usuario->socio == 1 ? 'Sim' : '' }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-sm btn-secondary me-2">VER</a>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-secondary">EDITAR</a>
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
    <div class="bg-white px-2">
        {{ $usuarios->links() }}
    </div>
@endsection
