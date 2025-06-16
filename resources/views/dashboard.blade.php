
@extends('template')
@section('titulo', 'Dashboard')

@section('conteudo')
<div class="container py-5">
    <h2 class="mb-5 text-center">Bem-vindo(a), {{ session('usuario_nome') }}</h2>
    <div class="d-flex flex-wrap justify-content-center gap-4">
        <div class="card shadow-sm text-center" style="width: 18rem; min-width: 260px;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-3">Cadastro de Usuários</h5>
                <p class="card-text flex-grow-1">Adicione novos usuários ao sistema.</p>
                <a href="{{ url('cadastro') }}" class="btn btn-primary mt-2">Cadastrar Usuário</a>
            </div>
        </div>
        <div class="card shadow-sm text-center" style="width: 18rem; min-width: 260px;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-3">Cadastro de Produtos</h5>
                <p class="card-text flex-grow-1">Cadastre novos produtos para venda.</p>
                <a href="{{ url('frmproduto') }}" class="btn btn-primary mt-2">Cadastrar Produto</a>
            </div>
        </div>
        <div class="card shadow-sm text-center" style="width: 18rem; min-width: 260px;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-3">Lista de Usuários</h5>
                <p class="card-text flex-grow-1">Veja todos os usuários cadastrados.</p>
                <a href="{{ url('usuarios') }}" class="btn btn-primary mt-2">Ver Usuários</a>
            </div>
        </div>
        <div class="card shadow-sm text-center" style="width: 18rem; min-width: 260px;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-3">Lista de Produtos</h5>
                <p class="card-text flex-grow-1">Veja todos os produtos cadastrados.</p>
                <a href="{{ url('ListaProdutos') }}" class="btn btn-primary mt-2">Ver Produtos</a>
            </div>
        </div>
        <div class="card shadow-sm text-center" style="width: 18rem; min-width: 260px;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-3">Lista de Contatos</h5>
                <p class="card-text flex-grow-1">Veja todas as mensagens de contato recebidas.</p>
                <a href="{{ route('ListaContatos') }}" class="btn btn-primary mt-2">Ver Contatos</a>
            </div>
        </div>
    </div>
</div>
@endsection