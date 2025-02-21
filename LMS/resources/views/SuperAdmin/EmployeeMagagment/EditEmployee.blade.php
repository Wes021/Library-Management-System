<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 700px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 180px
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }

        .field-wrap {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .button:hover {
            background: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    @include('layouts.SuperAdminNavbar') <!-- Always Include Navbar -->
    @include('layouts.SuperAdminSideNavbar')
 
    

    <div class="container">
        @include('common.alert')
        <h2>Edit Employee</h2>


        <form action="{{ route('UpdateEmployee', $admin->admin_id) }}" method="POST">
            @csrf

            <div class="field-wrap">
                <label>Employee ID</label>
                <input type="text" name="admin_id" value="{{ $admin->admin_id }}" required disabled>
            </div>

            <div class="field-wrap">
                <label>Name</label>
                <input type="text" name="name" value="{{ $admin->name }}" required>
            </div>

            <div class="field-wrap">
                <label>E-mail</label>
                <input type="email" name="email" value="{{ $admin->email }}" required>
            </div>

            <div class="field-wrap">
                <label>Role<span class="req">*</span></label>
                <select name="role_id">
                    <option value="">Select</option>
                    <option value="1" {{ $admin->role_id == 1 ? 'selected' : '' }}>SuperAdmin</option>
                    <option value="2" {{ $admin->role_id == 2 ? 'selected' : '' }}>Admin</option>
                    <option value="3" {{ $admin->role_id == 3 ? 'selected' : '' }}>Not Assigned</option>
                </select>
            </div>

            <div class="field-wrap">
                <label>Gender<span class="req">*</span></label>
                <select name="gender">
                    <option value="Not Added" {{ $admin->gender == "Not Added" ? 'selected' : '' }}>Not Added</option>
                    <option value="Male" {{ $admin->gender == "Male" ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $admin->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="field-wrap">
                <label>Phone Number</label>
                <input type="text" name="phone_number" value="{{ $admin->phone_number }}" required>
            </div>

            <button type="submit" class="button">Update Employee</button>
        </form>

        <a href="{{ route('DisplayEmployees') }}" class="back-link">Back to Employee List</a>
    </div>

</body>
</html>
