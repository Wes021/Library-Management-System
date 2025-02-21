<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User Status</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8f9fa;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            margin-top: 100px
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 80px
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        select {
            background-color: #f8f9fa;
        }

        button {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        input:disabled, select:disabled {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        .req {
            color: red;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    @include('layouts.SuperAdminNavbar') <!-- Always Include Navbar -->
    @include('layouts.SuperAdminSideNavbar')
    <h2>Update User Status</h2>
    @include('common.alert')

    <form action="{{route('UpdateStatus', $user->user_id)}}" method="POST">
        @csrf
        <label>User ID</label>
        <input type="text" name="user_id" value="{{ $user->user_id }}" disabled><br>

        <label>Name:</label>
        <input type="text" name="role_name" value="{{ $user->name }}" disabled><br>

        <label>User Email:</label>
        <input type="text" name="email" value="{{ $user->email }}" disabled><br>

        <label>Gender<span class="req">*</span></label>
        <select name="gender" disabled>
            <option value="">Select</option>
            <option value="Not Added" {{ $user->gender == "Not Added" ? 'selected' : '' }}>Not Added</option>
            <option value="Male" {{ $user->gender == "Male" ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $user->gender == "Female" ? 'selected' : '' }}>Female</option>
        </select><br>

        <label>Phone Number:</label>
        <input type="text" name="phone_number" value="{{ $user->phone_number }}" disabled><br>

        <label>Status<span class="req">*</span></label>
        <select name="status">
            <option value="0">Select</option>
            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Not Active</option>
        </select><br>

        <label>Profile Picture:</label>
        <input type="text" name="profile_picture" value="{{ $user->profile_picture }}" disabled><br>

        <button type="submit">Update Status</button>
        <a href="{{ route('DisplayUsers') }}">Back</a>
    </form>

    

</body>
</html>
