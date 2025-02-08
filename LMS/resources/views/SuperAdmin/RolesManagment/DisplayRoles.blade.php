<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Books List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->role_id }}</td>
                    <td>{{ $role->role_name }}</td>
                    <td><a href="{{ route('EditRoleForm', ['role_id' => $role->role_id]) }}">Edit</a></td>
                    <td><a href="{{ route('DeleteRoles',['role_id'=>$role->role_id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
