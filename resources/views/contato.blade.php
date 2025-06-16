@extends('template')
@section('titulo', 'Contato')


@section('conteudo')
    <div class='contato-form-container'>
        {{-- Exibe mensagem de sucesso --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/salvarcontato" class='contato-form' method ="POST">
            @csrf
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class='campo'>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class='campo'>

                <label for="assunto">Assunto</label>
                <input type="text" name="assunto" id="assunto" class='campo'>

                <label for="mensagem">Mensagem</label>
                <textarea name="mensagem" id="mensagem" class='campo-msg'></textarea>

                <input type="submit" value="Enviar" class='btn-submit'>
        </form>
    </div>
@endsection