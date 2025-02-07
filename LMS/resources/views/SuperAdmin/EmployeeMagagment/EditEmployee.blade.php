<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>

    <h2>Edit Book</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('UpdateEmployee', $admin->admin_id) }}" method="POST">
        @csrf

        <label>Employee ID</label>
        <input type="text" name="admin_id" value="{{ $admin->admin_id }}" required disabled><br>

        <label>Name:</label>
        <input type="text" name="name" value="{{ $admin->name }}" required><br>

        <label>E-mail:</label>    
        <input type="email" name="email" value="{{ $admin->email }}" required><br>

        <label>
            Role<span class="req">*</span>
        </label>
        
        <select name="role_id" id="role">
            <option value="">Select</option>
            <option value="1" {{ $admin->role_id == 1 ? 'selected' : '' }}>SuperAdmin</option>
            <option value="2" {{ $admin->role_id == 2 ? 'selected' : '' }}>Admin</option>
            <option value="3" {{ $admin->role_id == 3 ? 'selected' : '' }}>not assigned</option>
        </select><br>

        <label>
            Gender<span class="req">*</span>
          </label>
          
          <select name="gender" id="role">
            <option value="Not Added"{{ $admin->gender == "Not Added" ? 'selected' : '' }}>Not Added</option>
            <option value="Male"{{ $admin->gender == "Male" ? 'selected' : '' }}>Male</option>
            <option value="Female"{{ $admin->gender == 'Female' ? 'selected' : '' }}>Female</option>
            
          </select>


        

        <label>Phone number:</label>
        <input type="text" name="phone_number" value="{{ $admin->phone_number }}" required><br>

    

        <button type="submit">Update Employee</button>
    </form>

    <a href="{{ url('/books') }}">Back to Books List</a>

</body>
</html>
