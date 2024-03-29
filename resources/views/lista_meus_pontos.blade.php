<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pontos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-top: 20px; 
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; 
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .empty-message {
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Meus Pontos</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        @if ($pontos->isEmpty())
                            <p class="empty-message">Você ainda não registrou nenhum ponto.</p>
                        @else
                            <table>
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
                                            <td>{{ $ponto->hora_saida ?: 'Não registrada' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
