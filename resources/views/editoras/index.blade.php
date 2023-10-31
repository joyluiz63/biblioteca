@extends('layouts.master')

@section('content')

    <table class="table  table-striped">
        <thead>
            <th>Editora</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($editoras as $editora)
                <tr>
                    <td>{{ $editora->nome }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('editoras.edit', $editora->id) }}" class="btn btn-sm btn-secondary">EDITAR</a>
                            <form action="{{ route('editoras.destroy', $editora->id) }}" method="post">
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
    {{ $editoras->links() }}
@endsection
