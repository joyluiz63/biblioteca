@extends('layouts.master')

@section('content')

<div class="container bg-info-subtle mb-1 text-center">
    <p class="h3 text-center">Socio: {{ $nome }}<p>
    <p class="h5 text-center">Mensalidades -> Histórico</p>
</div>
    <table class="table  table-striped">
        <thead>
            <th>Sócio</th>
            <th>Mensalidade</th>
            <th>Valor Pago</th>
            <th>Data Pagamento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            @if($usuario->data == null) <tr class="table-danger"> @else <tr> @endif
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->mes_referencia }} </td>
                    <td>{{ $usuario->valor }} </td>
                    <td> @if ($usuario->data != null) {{date('d-m-Y', strtotime($usuario->data))}}
                         @else PENDENTE
                         @endif</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('mensalidades.edit', $usuario->usuario_id) }}" class="btn btn-sm btn-secondary me-2">RECEBER</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
@endsection
