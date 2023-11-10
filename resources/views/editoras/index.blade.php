@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h5">Editoras</p>
    </div>

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
                            <a href="{{ route('editoras.edit', $editora->id) }}"
                                class="btn btn-sm btn-secondary me-2">EDITAR</a>
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
    <div class="bg-white px-2">
        {{ $editoras->links() }}
    </div>
@endsection
