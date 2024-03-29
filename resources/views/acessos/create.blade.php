@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Criar Acesso</h1>
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('acessos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome_pessoa" class="form-label">Nome Pessoa</label>
                <input type="text" class="form-control" id="nome_pessoa" name="nome_pessoa">
            </div>
            <div class="mb-3">
                <label for="assunto" class="form-label">Assunto</label>
                <input type="text" class="form-control" id="assunto" name="assunto">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
            </div>
            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data" placeholder="D/M/Y">
            </div>
            <div class="mb-3">
                <label for="hora_entrada" class="form-label">Hora Entrada</label>
                <input type="time" class="form-control" id="hora_entrada" name="hora_entrada">
            </div>
            <div class="mb-3">
                <label for="hora_saida" class="form-label">Hora Saída</label>
                <input type="time" class="form-control" id="hora_saida" name="hora_saida">
            </div>
            <div class="mb-3">
                <label for="destino" class="form-label">Destino</label>
                <input type="text" class="form-control" id="destino" name="destino">
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
@endsection