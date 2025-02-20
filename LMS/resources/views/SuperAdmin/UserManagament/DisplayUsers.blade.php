<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: #f8f9fa;
            padding: 20px;
            font-size: 16px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 150px
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 14px 20px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .action-buttons a {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            transition: 0.3s;
            text-decoration: none;
            margin-right: 5px;
        }

        .edit {
            background: #28a745;
            color: white;
        }

        .edit:hover {
            background: #218838;
        }

        .delete {
            background: #dc3545;
            color: white;
        }

        .delete:hover {
            background: #c82333;
        }

        img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        td img {
            max-width: 50px;
            height: 50px;
        }

        td a {
            text-decoration: none;
            color: #fff;
        }

        td a:hover {
            opacity: 0.8;
        }

        .action-buttons {
            display: flex;
        }
    </style>
</head>
<body>

@include('layouts.SuperAdminNavbar') <!-- Always Include Navbar -->
    <div class="container">
        @include('common.alert')
        <h2>Users List</h2>

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
                    <th>Actions</th>
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
                        <td>
                            @if($user->profile_picture)
                                <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="Profile Picture">
                            @else
                                No Picture
                            @endif
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('EditUserForm', ['user_id' => $user->user_id]) }}" class="edit">Change status</a>
                            <a href="{{ route('RemoveUser',['user_id'=>$user->user_id]) }}" class="delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('DisplayUsers') }}" style="text-align: center; display: block; margin-top: 20px;">Back</a>
    </div>

</body>
</html>
