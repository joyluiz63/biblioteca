@extends('layouts.master')

@section('content')
    <div class="d-inline-flex p-2 bg-body-dark text-white">
        <p class="h5"><a href="{{ route('autors.index') }}">Autores</a></p>
    </div>
    <div class="col-sm-10 bg-light" style="float:none;margin:auto;">
        <table class="table  table-striped">
            <thead>
                <th>Autor</th>
                <th>Espirito</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($autors as $autor)
                    <tr>
                        <td>{{ $autor->nome }}</td>
                        <td>
                            {{ $autor->espirito == 0 ? 'Não' : 'Sim' }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('autors.edit', $autor->id) }}"
                                    class="btn btn-sm btn-secondary me-2">EDITAR</a>
                                <form action="{{ route('autors.destroy', $autor->id) }}" method="post">
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
    </div>
    
    <div class="col-sm-10 bg-light px-2" style="float:none;margin:auto;">
        {{ $autors->links() }}
    </div>
@endsection
