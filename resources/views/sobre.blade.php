@extends('template')
@section('titulo', 'Sobre')

@section('conteudo')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="w-100" style="max-width: 900px;">
        <div class="p-5 bg-white rounded shadow-sm">
            <h1 class="text-primary mb-4">Framework PHP {{$frm}}</h1>
            <p class="mb-4">
               Laravel é livre e open-source criado por Taylor B. Otwell para o desenvolvimento de sistemas web que utilizam o padrão MVC (model, view, controller). Algumas características proeminentes do Laravel são sua sintaxe simples e concisa, um sistema modular com gerenciamento de dependências dedicado, várias formas de acesso a banco de dados relacionais e vários utilitários indispensáveis no auxílio ao desenvolvimento e manutenção de sistemas.
            </p>
            <h3>Requisitos</h3>
            @if($frm == "(Laravel)")
            
                <ol class="list-group list-group-numbered mb-4">
                    <li class="list-group-item">PHP</li>
                    <li class="list-group-item">Composer</li>
                </ol>
            @else 
                <div class="alert alert-info mb-4">Não há requisitos!</div>
            @endif

            <h3 class="mt-4">Características</h3>
            <ol class="list-group list-group-numbered">
                @foreach($vtg as $dados)
                    <li class="list-group-item">{{ $dados }}</li>
                @endforeach
            </ol>
        </div>
    </div>
</div>
@endsection