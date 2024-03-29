<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pontos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .alert {
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            margin-bottom: 20px;
        }

        .card-header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Lista de Pontos</div>

                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <table>
                            <thead>
                                <tr>
                                    <th>Nome do Usuário</th>
                                    <th>Data Entrada</th>
                                    <th>Data Saida</th>
                                    <th>Hora Entrada</th>
                                    <th>Hora Saída</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pontos as $ponto)
                                <tr>
                                    <td>{{ $ponto->nome_usuario }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ponto->data_entrada)->format('d/m/Y') }}</td>
                                    <td>{{ $ponto->data_saida ? \Carbon\Carbon::parse($ponto->data_saida)->format('d/m/Y') : 'Data Não Registrada' }}</td>
                                    <td>{{ $ponto->hora_entrada }}</td>
                                    <td>{{ $ponto->hora_saida ?: 'Não registrada' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Nenhum ponto registrado ainda.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
