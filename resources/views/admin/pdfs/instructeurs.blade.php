<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Élèves</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }



        .actions button:hover {
            background-color: #45a049;
        }

        @media print {
            .actions {
                display: none;
            }
        }
    </style>
</head>

<body>
    <h1 style="font-size: 2rem; color: #2333">Liste des Instructeur</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $student)
                <tr>
                    <td>{{ $student->nom }}</td>
                    <td>{{ $student->prenom }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
