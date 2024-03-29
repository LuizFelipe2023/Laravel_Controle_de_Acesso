@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista de Pontos</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data Entrada</th>
                                <th>Data Saida</th>
                                <th>Hora Entrada</th>
                                <th>Hora Saída</th>
                                <th>Funcionário</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pontos as $ponto)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($ponto->data_entrada)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ponto->data_saida)->format('d/m/Y') }}</td>
                                    <td>{{ $ponto->hora_entrada }}</td>
                                    <td>{{ $ponto->hora_saida ?: 'Não registrada' }}</td>
                                    <td>{{ $ponto->nome_usuario }}</td> 
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Nenhum ponto registrado ainda.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $pontos->links() }}
                    </div>

                    <div class="mt-3 text-center">
                        <form action="{{ route('pontos.pdf') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary">Gerar PDF</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
