@extends('template')
@section('titulo', 'Produtos')

@section('conteudo')
    <div class='cards'>
    @foreach($prods as $p)
        <div class='card'>
            <img src="{{asset('storage/' . $p['imagem'])}}">
            <h3>{{$p['nome']}}</h3>
            <p>R$ {{$p['preco']}}</p>
            <p>{{$p['quantidade']}} disponiveis</p>
        </div>
    @endforeach
    </div>
@endsection