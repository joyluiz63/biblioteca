@extends('layouts.master')

@section('content')

    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h5"><a href="{{ route('categorias.index') }}">Categorias</a></p>
    </div>

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
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-secondary me-2">EDITAR</a>
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
    <div class="bg-white px-2">
        {{ $categorias->links() }}
    </div>
@endsection
