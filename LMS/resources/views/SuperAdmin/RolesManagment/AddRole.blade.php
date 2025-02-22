<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Role</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .field-wrap {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input:disabled {
            background: #e9ecef;
            color: #6c757d;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }

        button:hover {
            background: #0056b3;
        }

        .back-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    

    <!-- Content Area -->
    <div class="content">
        <div class="container">
            @include('common.alert')
            <h2>Add Role</h2>
            <form action="{{ route('AddRole') }}" method="GET">
                @csrf
                <div class="field-wrap">
                    <label>Role ID</label>
                    <input value="Automatically generated" name="name" type="text" disabled />
                </div>

                <div class="field-wrap">
                    <label>Role Name<span class="req">*</span></label>
                    <input name="role_name" type="text" required autocomplete="off" />
                </div>

                <button type="submit">Add Role</button>
            </form>
            <a href="{{ route('DisplayRoles') }}" class="back-link">Back to List</a>
        </div>
    </div>

    
</body>

</html>