@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Meus Pontos</div>

                <div class="card-body">
                    @if ($pontos->isEmpty())
                        <p>Você ainda não registrou nenhum ponto.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data Entrada</th>
                                    <th>Data Saida</th>
                                    <th>Hora Entrada</th>
                                    <th>Hora Saída</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pontos as $ponto)
                                    <tr>
                                    <td>{{ \Carbon\Carbon::parse($ponto->data_entrada)->format('d/m/Y') }}</td>
                                        <td>{{ $ponto->data_saida ? \Carbon\Carbon::parse($ponto->data_saida)->format('d/m/Y') : 'Data Não Registrada' }}</td>
                                        <td>{{ $ponto->hora_entrada }}</td>
                                        <td>{{ $ponto->hora_saida ?: ' Hora Não registrada' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $pontos->links() }}
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('meus-pontos.pdf') }}" class="btn btn-primary">Gerar PDF</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
