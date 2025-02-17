<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Role</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            margin-top: 180px;
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
  @include('layouts.SuperAdminNavbar') <!-- Always Include Navbar -->
    <div class="container">
        <h2>Add Role</h2>
        <form action="{{ route('AddRole') }}" method="GET">
            @csrf
            <div class="field-wrap">
                <label>Role ID</label>
                <input value="Automatically generated" name="name" type="text" disabled/>
            </div>
        
            <div class="field-wrap">
                <label>Role Name<span class="req">*</span></label>
                <input name="role_name" type="text" required autocomplete="off"/>
            </div>

            <button type="submit">Add Role</button>
        </form>
        <a href="{{ route('DisplayRoles') }}" class="back-link">Back to List</a>
    </div>

</body>
</html>
