<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
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

        /* Profile Container */
        .profile-container {
            max-width: 800px;
            margin: 20px auto;
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
    <!-- Include Navbar and Sidebar -->
    @include('layouts.NavSidebarUser')

    <!-- Content Area -->
    <div class="content">
        @include('common.alert')
        @foreach ($borrows as $borrow)
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-name" id="profileName">Borrow Details</div>
            </div>
            <div class="profile-info">
                <h5>Borrow ID:</h5>
                <p id="profileEmail">{{ $borrow->borrow_id }}</p>

                <h5>Book id:</h5>
                <p id="profilePhone">{{ $borrow->book_id }}</p>

                <h5>ISBN</h5>
                <p id="profileGender">{{ $borrow->ISBN }}</p>

                <h5>Book Name</h5>
                <p id="profileGender">{{ $borrow->book_title }}</p>

                <h5>to be return by:</h5>
                <p id="profileGender">{{ $borrow->due_date }}</p>

                <h5>Status</h5>
                @if ($borrow->borrow_status_id == 8)
                <p style="color: red" id="profileGender">{{$borrow->borrow_status}}</p>
                @else
                <p style="color:green" id="profileGender">{{$borrow->borrow_status}}</p>
                @endif

                <h5>Created:</h5>
                <p id="profileGender">{{ $borrow->created_at }}</p>

                <h5>Fines:</h5>
                <p id="profileGender">{{ $borrow->fine }}<span>$</span></p>
            </div>

            @if ($borrow->borrow_status_id == 6)
            @else
                <a href="{{ route('DeleteBorrow', ['borrow_id' => $borrow->borrow_id]) }}">Delete Borrow</a> <br>
                <a href="{{ route('returnBorrow', ['borrow_id' => $borrow->borrow_id]) }}">Return the book</a>
            @endif
        </div>
        @endforeach

        <a href="{{ route('dashboard') }}">Dashboard</a>
    </div>

    
</body>

</html>