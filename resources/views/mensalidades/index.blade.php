@extends('layouts.master')

@section('content')

<div class="mb-2">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <p>Busca por Sócio<p>
          <form action="{{ route('mensalidades.index') }}" method="GET" class="d-flex" role="search">
            <input class="form-control me-2" type="search" name="search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Busca</button>
          </form>
        </div>
      </nav>
</div>

    <table class="table  table-striped">
        <thead>
            <th>ID</th>
            <th>Socio</th>
            <th>vencimento</th>
            <th>Valor</th>
            <th>Pago</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($mensalidades as $mensalidade)
                <tr>
                    <td>{{ $mensalidade->id }}</td>
                    <td>{{ $mensalidade->nome }}</td>
                    <td>{{ $mensalidade->mes_referencia }}</td>
                    <td>R$ {{ $mensalidade->valor }} </td>
                    <td>{{ $mensalidade->status == 0 ? 'Pendente' : 'Sim' }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('mensalidades.show', $mensalidade->id) }}" class="btn btn-sm btn-secondary">VER</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $mensalidades->links() }}
@endsection
