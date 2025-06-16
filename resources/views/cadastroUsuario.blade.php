@extends('template')
@section('titulo', 'Cadastro de Usuário')

@section('conteudo')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="w-100" style="max-width: 700px;">
        <div class="p-5 bg-white rounded shadow-sm">
            <h2 class="text-center mb-4 text-primary">Cadastro de Usuário</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('salvarusuario') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100 py-2 fs-5">Cadastrar</button>
            </form>
            <div class="text-center mt-4">
                <a href="{{ url('frmlogin') }}" class="btn btn-link">Já tem uma conta? Faça login</a>
                <br>
                <a href="{{ url('cadastro') }}" class="btn btn-link">Não tem uma conta? Cadastre-se</a>
            </div>
        </div>
    </div>
</div>
@endsection