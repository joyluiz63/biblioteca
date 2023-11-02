@extends('layouts.master')

@section('content')

    <table class="table  table-striped">
        <thead>
            <th>Usuário</th>
            <th>Telefone(s)</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->fone }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{-- {{ route('users.edit', $user->id) }} --}}" class="btn btn-sm btn-secondary">EDITAR</a>
                            {{-- <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
    {{ $users->links() }}
@endsection
