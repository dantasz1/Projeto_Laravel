@extends('template')
@section('titulo', 'Cadastrar produto')


@section('conteudo')
    <div class='contato-form-container'>
        <form action="/addproduto" method="POST" enctype='multipart/form-data' class='contato-form' >
            @csrf
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required class='campo'>

                <label for="preco">preço</label>
                <input type="number" name="preco" id="preco" required class='campo'>

                <label for="quantidade">quantidade</label>
                <input type="number" name="quantidade" id="quantidade" required class='campo'>

                <label for="imagem">imagem</label>
                <input type="file" id="imagem" name="imagem" accept="image/*" required class="campo-file">

                <input type="submit" value="Enviar" class='btn-submit'>
        </form>
    </div>
@endsection