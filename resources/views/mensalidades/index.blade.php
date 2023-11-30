@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <nav class="navbar">
            <p class="h5 text-white"><a href="{{ route('mensalidades.index') }}">Sócios</a></p>
            <form action="{{ route('mensalidades.index') }}" method="GET" class="d-flex" role="search">
                <input class="form-input me-2" type="search" name="search" aria-label="Search">
                <button class="btn btn-outline-primary active" type="submit">Busca</button>
            </form>
        </nav>
    </div>

    <table class="table  table-striped">
        <thead>
            <th>Socio</th>
            <th>Valor Acordado</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($socios as $socio)
                <tr>
                    <td>{{ $socio->nome }}</td>
                    <td>R$ {{ $socio->valor }} </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('mensalidades.show', $socio->id) }}" class="btn btn-sm btn-primary me-2">VER MENSALIDADES</a>
                            <a href="{{ route('mensalidades.edit', $socio->id) }}" class="btn btn-sm btn-primary me-2">EDITAR VALOR</a>
                            <a href="{{ route('mensalidades.create', ["id" => $socio->id] ) }}" class="btn btn-sm btn-primary me-2">GERAR MENSALIDADES</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="bg-white px-2">
        {{ $socios->links() }}
    </div>
@endsection
