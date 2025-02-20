<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
        }

        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #007bff;
            object-fit: cover;
        }

        .profile-name {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 15px;
        }

        .profile-info {
            margin-top: 20px;
            font-size: 1.1rem;
        }

        .profile-info p {
            margin-bottom: 10px;
        }

        .profile-info h5 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #007bff;
        }

        .profile-bio {
            margin-top: 20px;
            font-size: 1rem;
            color: #555;
        }

        .btn-edit {
            display: block;
            margin-top: 30px;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            font-size: 1.1rem;
            text-align: center;
            text-decoration: none;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    @include('layouts.UserNavbar2') <!-- Always Include Navbar -->
   

    <div class="content">
        
    </div>
    <div class="container profile-container">
        @include('common.alert')
        <form action="{{ route('UpdateUser',$user->user_id) }}" method="POST">
            @csrf
        <div class="profile-header">
            <img src="{{ $user->profile_picture }}" alt="Profile Picture" class="profile-image" id="profileImage">
            <div class="profile-name" id="profileName">Edit profile image
                <input type="text" name="profile_picture" value="{{ $user->profile_picture }}" required>
            </div>

        </div>

        <div class="profile-info">
            <h5>name:</h5>
            <input type="text" name="name" value="{{ $user->name }}" required>

            <h5>Email:</h5>
            <input type="email" name="email" value="{{ $user->email }}" required>

            
            <select name="gender" id="role">
                <option value="Not Added"{{ $user->gender == "Not Specified" ? 'selected' : '' }}>Not Added</option>
                <option value="Male"{{ $user->gender == "Male" ? 'selected' : '' }}>Male</option>
                <option value="Female"{{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                
              </select>

              <h5>phone number:</h5>
            <input type="text" name="phone_number" value="{{ $user->phone_number }}" required>

            


              
        </div>
        
        <button class="btn-edit" id="editProfileBtn" type="submit">Edit</button>
        </form>

        
    </div>
    
        
    </div>
</body>

</html>
