<!-- pdf/visitors.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de visitantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 8px;
        }

        table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        table td {
            text-align: center;
        }
    </style>
</head>
<body>
    dd($visitors)
    <h1>Lista de Visitantes</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Generación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->birth_date }}</td>
                    <td>{{ $visitor->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
