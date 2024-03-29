@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Editar Acesso</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('acessos.update', $acesso->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome_pessoa" class="form-label">Nome Pessoa</label>
                <input type="text" class="form-control" id="nome_pessoa" name="nome_pessoa" value="{{ $acesso->nome_pessoa }}">
            </div>
            <div class="mb-3">
                <label for="assunto" class="form-label">Assunto</label>
                <input type="text" class="form-control" id="assunto" name="assunto" value="{{ $acesso->assunto }}">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $acesso->cpf }}">
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data" value="{{ $acesso->data }}">
            </div>
            <div class="mb-3">
                <label for="hora_entrada" class="form-label">Hora Entrada</label>
                <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" value="{{ $acesso->hora_entrada }}">
            </div>
            <div class="mb-3">
                <label for="hora_saida" class="form-label">Hora Saída</label>
                <input type="time" class="form-control" id="hora_saida" name="hora_saida" value="{{ $acesso->hora_saida }}">
            </div>
            <div class="mb-3">
                <label for="destino" class="form-label">Destino</label>
                <input type="text" class="form-control" id="destino" name="destino" value="{{ $acesso->destino }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection