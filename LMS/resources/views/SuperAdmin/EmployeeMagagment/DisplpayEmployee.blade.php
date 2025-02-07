<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
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
                <th>ID</th @disabled(true)>
                <th>name</th>
                <th>email</th>
                <th>Role</th>
                <th>Gender</th>
                <th>phone_number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->admin_id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->role_name }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->phone_number }}</td>
                    
                    <td><a href="{{ route('EditEmployees', ['admin_id' => $employee->admin_id]) }}">Edit</a></td>
                    <td><a href="{{ route('DeleteEmployee',['admin_id'=>$employee->admin_id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
