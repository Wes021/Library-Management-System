<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #333;
            --secondary-color: #444;
            --text-color: white;
            --hover-color: #555;
            --navbar-height: 70px; /* Height of the navbar */
            --sidebar-width: 250px; /* Width of the sidebar */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Content Area */
        .content {
            margin-top: var(--navbar-height); /* Adjust for navbar height */
            padding: 20px;
            transition: margin-left 0.3s;
            flex: 1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        th,
        td {
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

        a.back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Include Navbar and Sidebar -->
    @include('layouts.NavSidebarSuperadmin')

    <!-- Content Area -->
    <div class="content">
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
                            <a href="{{ route('RemoveUser', ['user_id' => $user->user_id]) }}" class="delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('SuperAdminDashboard') }}" class="back-link">Back to Dashboard</a>
        </div>
    </div>

   
</body>

</html>