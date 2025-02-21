<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        td {
            text-align: center;
        }

        a {
            color: #2980b9;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
            transition: 0.3s;
        }

        a:hover {
            color: #3498db;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 1.5rem;
            }

            table {
                font-size: 14px;
            }

            td {
                padding: 8px;
            }

            a {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    @include('common.alert')
    <h2>Languages List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($languages as $language)
                <tr>
                    <td>{{ $language->language_id }}</td>
                    <td>{{ $language->language_name }}</td>
                    <td>
                        <a href="{{ route('EditLanguageForm', ['language_id' => $language->language_id]) }}">Edit</a>
                        <a href="{{ route('DeleteLanguage', ['language_id' => $language->language_id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('Addlanguage') }}">Add Language</a><br>
    <a href="{{ route('AdminDashboard') }}">Return</a>
</div>

</body>
</html>
