
@extends('template')
@section('titulo', 'Editar usuario')

@section('conteudo')
<div class="container py-5 d-flex justify-content-center align-items-center min-vh-80">
    <div class="card shadow" style="max-width: 450px; width: 100%;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4 text-primary">Editar Usuário</h2>
            <form action="/atualizarusuario/{{$user->id}}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="fnome" class="form-label">Nome</label>
                    <input type="text" id="fnome" name="fnome" required value='{{$user->nome}}' class="form-control">
                </div>
                <div class="mb-3">
                    <label for="femail" class="form-label">E-mail</label>
                    <input type="email" id="femail" name="femail" required value='{{$user->email}}' class="form-control">
                </div>
                <div class="mb-3">
                    <label for="fsenha" class="form-label">Senha</label>
                    <input type="password" id="fsenha" name="fsenha" class="form-control" placeholder="Deixe em branco para não alterar">
                </div>
                <button type="submit" class="btn btn-primary w-100">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection