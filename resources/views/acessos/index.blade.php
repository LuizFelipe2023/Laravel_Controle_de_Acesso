@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Lista de Acessos</h1>
        @if(session('error'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <a href="{{ route('pdf') }}" class="btn btn-warning btn-sm">Gerar PDF</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Pessoa</th>
                    <th>Assunto</th>
                    <th>CPF</th>
                    <th>Data</th>
                    <th>Hora Entrada</th>
                    <th>Hora Saída</th>
                    <th>Destino</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($acessos as $acesso)
                <tr>
                    <td>{{ $acesso->id }}</td>
                    <td>{{ $acesso->nome_pessoa }}</td>
                    <td>{{ $acesso->assunto }}</td>
                    <td>{{ $acesso->cpf }}</td>
                    <td>{{ date('d/m/Y', strtotime($acesso->data)) }}</td>
                    <td>{{ $acesso->hora_entrada }}</td>
                    <td>{{ $acesso->hora_saida }}</td>
                    <td>{{ $acesso->destino }}</td>
                    <td>
                        <a href="{{ route('acessos.show', $acesso->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('acessos.edit', $acesso->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('acessos.destroy', $acesso->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('acessos.create') }}" class="btn btn-success">Novo Acesso</a>
    </div>
@endsection