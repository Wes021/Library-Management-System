<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('UpdateStatus',$user->user_id)}}" method="POST">
        @csrf
        <label>user_id ID</label>
        <input type="text" name="admin_id" value="{{ $user->user_id }}"  disabled><br>

        <label>Name:</label>
        <input type="text" name="role_name" value="{{ $user->name}}"  disabled><br>

        <label>User Email</label>
        <input type="text" name="admin_id" value="{{ $user->email }}"  disabled><br>

        <label>
            Gender<span class="req">*</span>
        </label>
        <select name="gender" id="role" disabled>
            <option value="">Select</option>
            <option value="Not Added" {{ $user->gender == "Not Added" ? 'selected' : '' }}>Not Added</option>
            <option value="Male" {{ $user->gender == "Male" ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $user->gender == "Female" ? 'selected' : '' }}>Female</option>
        </select><br>

        <label>phone number</label>
        <input type="text" name="admin_id" value="{{ $user->phone_number }}"  disabled><br>

        <label>
            Status<span class="req">*</span>
        </label>
        <select name="status" id="role" >
            <option value="0">Select</option>
            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Not Active</option>
        </select><br>

        <label>profile picture</label >
        <input type="text" name="admin_id" value="{{ $user->profile_picture }}"  disabled><br>

        <button type="submit">Update Status</button>
    </form>
</body>
</html>