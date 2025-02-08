<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('UpdateRole',$role->role_id)}}" method="POST">
        @csrf
        <label>Role ID</label>
        <input type="text" name="admin_id" value="{{ $role->role_id }}" required disabled><br>

        <label>Role Name:</label>
        <input type="text" name="role_name" value="{{ $role->role_name }}" required><br>

        <button type="submit">Update role</button>
    </form>
</body>
</html>