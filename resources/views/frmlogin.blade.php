@extends('template')
@section('titulo', 'Login')

@section('conteudo')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="w-100" style="max-width: 900px;">
        <div class="p-5 bg-white rounded shadow-sm">
            <h2 class="text-center mb-4 text-primary">Login</h2>
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ url('login') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fs-5">Entrar</button>
            </form>
            <div class="text-center mt-4">
                <a href="{{ url('cadastro') }}" class="btn btn-link">Não tem uma conta? Cadastre-se</a>
            </div>
        </div>
    </div>
</div>
@endsection