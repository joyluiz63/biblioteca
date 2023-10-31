@extends('layouts.master')

@section('content')

    <table class="table  table-striped">
        <thead>
            <th>Categoria</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nome }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-secondary">EDITAR</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger active"
                                    onclick="return confirm('Tem certeza que deseja excluir o registro?')">
                                    EXCLUIR
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categorias->links() }}
@endsection
