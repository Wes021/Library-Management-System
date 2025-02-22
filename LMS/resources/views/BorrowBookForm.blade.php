<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow a Book</title>
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

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        /* Container for the form */
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .section {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Include Navbar and Sidebar -->
    

    <!-- Content Area -->
    <div class="content">
        @include('common.alert')
        <div class="container">
            <h2>Borrow a Book</h2>
            <form action="{{ route('NewBorrow') }}" id="borrowForm" method="GET">
                @csrf

                <input type="hidden" name="book_id" value="{{ $book->book_id }}">
                <input type="hidden" name="user_id" value="{{ $user->user_id }}">

                <div class="section">
                    <h3>Book Details</h3>
                    <label for="bookId">Book ID</label>
                    <input type="text" id="bookId" value="{{ $book->book_id }}" disabled required>

                    <label for="isbn">ISBN</label>
                    <input type="text" id="isbn" value="{{ $book->ISBN }}" disabled required>

                    <label for="bookStatus">Book Status</label>
                    <input type="text" id="bookStatus" value="{{ $book->book_status }}" disabled required>

                    <label for="bookTitle">Book Title</label>
                    <input type="text" id="bookTitle" value="{{ $book->book_title }}" disabled required>

                    <label for="fineRate">Fine Rate</label>
                    <input type="text" id="fineRate" value="{{ $book->fine_rate }}" disabled required>
                </div>

                <div class="section">
                    <h3>User Details</h3>
                    <label for="userId">Your ID</label>
                    <input type="text" id="userId" value="{{ $user->user_id }}" disabled required>

                    <label for="userName">Your Name</label>
                    <input type="text" id="userName" value="{{ $user->name }}" disabled required>
                </div>

                <div class="section">
                    <h3>Borrowing Duration</h3>
                    <label for="days">Select Borrowing Period (Days):</label>
                    <input type="number" id="days" name="days" min="1" max="30" required>
                </div>

                <button type="submit">Submit</button>
            </form>

            <a href="{{ route('/') }}">Cancel</a>
        </div>
    </div>

    
</body>

</html>