@extends('template')
@section('titulo', 'Lista de Contatos')

@section('conteudo')
<div class="container py-4">
    <h2 class="mb-4">Lista de Contatos</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Assunto</th>
                    <th>Mensagem</th>
                    <th>Data</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->assunto }}</td>
                    <td>{{ $contato->mensagem }}</td>
                    <td>{{ $contato->created_at->format('d/m/Y H:i') }}</td>
                    <td class="text-center">
                        <form action="{{ route('excluircontato', $contato->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este contato?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum contato encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection