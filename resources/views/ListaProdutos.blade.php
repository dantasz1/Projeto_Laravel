@extends('template')
@section('titulo', 'Lista de Produtos')

@section('conteudo')
<div class="container py-4">
    <h2 class="mb-4">Lista de Produtos</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Data de Cadastro</th>
                    <th class="text-center" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td style="max-width: 300px;">
                        <span class="d-inline-block text-truncate w-100" title="{{ $produto->descricao }}">
                            {{ $produto->descricao }}
                        </span>
                    </td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>
                        @if($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem do produto" class="img-thumbnail" style="max-width: 80px; max-height: 80px;">
                        @else
                            <span class="text-muted">Sem imagem</span>
                        @endif
                    </td>
                    <td>{{ $produto->created_at ? $produto->created_at->format('d/m/Y H:i') : '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('frmeditarproduto', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('excluirproduto', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Nenhum produto cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection