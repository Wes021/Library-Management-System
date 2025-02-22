<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
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

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        @include('common.alert')
        <div class="container">
            <h2>Employees List</h2>

            <a href="{{ route('Addadmin') }}" class="btn">Add Employee</a>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
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
                        <td class="action-buttons">
                            <a href="{{ route('EditEmployees', ['admin_id' => $employee->admin_id]) }}" class="edit">Edit</a>
                            <a href="{{ route('DeleteEmployee', ['admin_id' => $employee->admin_id]) }}" class="delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('SuperAdminDashboard') }}" class="btn" style="margin-top: 15px;">Back</a>
        </div>
    </div>

    
</body>

</html>