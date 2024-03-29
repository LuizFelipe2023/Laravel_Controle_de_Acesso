<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Acessos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            font-size: 12px;
            width: 100%;
            border-collapse: collapse;
            margin: 20mm auto; 
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Lista de Acessos</h1>
    <table>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>