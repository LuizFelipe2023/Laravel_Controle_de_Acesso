@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-5">Detalhes do Acesso</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $acesso->id }}</p>
                <p><strong>Nome Pessoa:</strong> {{ $acesso->nome_pessoa }}</p>
                <p><strong>Assunto:</strong> {{ $acesso->assunto }}</p>
                <p><strong>CPF:</strong> {{ $acesso->cpf }}</p>
                <p><strong>Data:</strong> {{ $acesso->data }}</p>
                <p><strong>Hora Entrada:</strong> {{ $acesso->hora_entrada }}</p>
                <p><strong>Hora Saída:</strong> {{ $acesso->hora_saida }}</p>
                <p><strong>Destino:</strong> {{ $acesso->destino }}</p>
            </div>
        </div>
        <a href="{{ route('acessos.index') }}" class="btn btn-primary mt-3">Voltar</a>
    </div>
@endsection