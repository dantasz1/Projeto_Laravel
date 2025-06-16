@extends('template')
@section('titulo', 'Usuarios')

@section('conteudo')
<div class="container py-4">
    <h2 class="mb-4">Lista de Usuários</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th class="text-center" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr>
                    <td>{{ $u->nome }}</td>
                    <td>{{ $u->email }}</td>
                    <td class="text-center">
                        <a href="/frmeditarusuario/{{$u->id}}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                    <td class="text-center">
                        <form action="/excluirusuario/{{$u->id}}" method='POST' onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection