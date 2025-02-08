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
                <th>User ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Gender</th>
                <th>Phone number</th>
                <th>Status</th>
                <th>Profile picture</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->user_status }}</td>
                    <td>{{$user->profile_picture}}</td>
                    <td><a href="{{ route('EditUserForm', ['user_id' => $user->user_id]) }}">Change status</a></td>
                    <td><a href="{{ route('RemoveUser',['user_id'=>$user->user_id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
