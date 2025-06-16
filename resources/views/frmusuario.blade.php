@extends('template')
@section('titulo', 'Cadastar usuario')


@section('conteudo')
    <div class='contato-form-container'>
        <form action="/addusuario" method='POST' class='contato-form'>
            @csrf
                <label for="nome">Nome</label>
                <input type="text" name="fnome" id="fnome" class='campo'>

                <label for="email">E-mail</label>
                <input type="email" name="femail" id="femail" class='campo'>

                <label for="senha">Senha</label>
                <input type="password" name="fsenha" id="fsenha" class='campo'>

                <input type="submit" value="Enviar" class='btn-submit'>
        </form>
    </div>
@endsection