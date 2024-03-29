@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista de Usuários</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Função</th>
                                <th>Turno</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nome }}</td>
                                <td>{{ $usuario->cpf }}</td>
                                <td>{{ $usuario->funcao }}</td>
                                <td>{{ $usuario->turno }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3 text-center">
                <form action="{{ route('usuarios.pdf') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Gerar PDF</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
