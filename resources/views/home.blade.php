@extends('template')
@section('titulo', 'Home')

@section('conteudo')
    <div class="cards">
        @foreach($crd as $card)
            <div class="card">
                <img src="{{$card['imagem']}}" alt="">
                <h3>{{$card['nome']}}</h3>
                <p>{{$card['texto']}}</p>
                <p>{{$card['preco']}}</p>
                <button>saiba mais</button>
            </div>
        @endforeach
    </div>
@endsection