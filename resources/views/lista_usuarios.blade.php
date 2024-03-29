<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px; 
        }
        h2 {
            text-align: center; 
            margin-bottom: 20px; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lista de Funcionários</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Função</th>
                <th>Turno</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->nome }}</td>
                <td>{{ $user->cpf }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->funcao }}</td>
                <td>{{ $user->turno }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
