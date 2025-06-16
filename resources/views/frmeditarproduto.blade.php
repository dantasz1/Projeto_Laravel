@extends('template')
@section('titulo', 'Editar Produto')

@section('conteudo')
<div class="container py-5 d-flex justify-content-center align-items-center min-vh-80">
    <div class="card shadow" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4 text-primary">Editar Produto</h2>
            <form action="{{ route('atualizarproduto', $produto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" id="nome" name="nome" required value="{{ $produto->nome }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" step="0.01" id="preco" name="preco" required value="{{ $produto->preco }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" id="imagem" name="imagem" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Atualizar Produto</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <a href="{{ route('produtos') }}" class="text-decoration-none">Voltar para a lista de produtos</a>
            </div>
        </div>
    </div>
</div>
@endsection