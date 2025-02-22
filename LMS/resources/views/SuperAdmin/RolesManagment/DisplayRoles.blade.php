<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roles List</title>
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
            font-family: Arial, sans-serif;
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
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .btn:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
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

        td a {
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        .edit {
            background: #28a745;
        }

        .edit:hover {
            background: #218838;
        }

        .delete {
            background: #dc3545;
        }

        .delete:hover {
            background: #c82333;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        a.back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        a.back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .container {
                padding: 15px;
            }
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
            <h2>Roles List</h2>
            <a href="{{ route('Addrole') }}" class="btn">Add Role</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->role_id }}</td>
                        <td>{{ $role->role_name }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('EditRoleForm', ['role_id' => $role->role_id]) }}" class="edit">Edit</a>
                            <a href="{{ route('DeleteRoles', ['role_id' => $role->role_id]) }}" class="delete">Delete</a>
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