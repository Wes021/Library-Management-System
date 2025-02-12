<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow a Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
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
    </style>
</head>

<body>
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
                <label for="borrowAt">Borrow Date & Time</label>
                <input type="datetime-local" name="borrowed_at" id="borrowAt" required>

                <label for="returnAt">Return Date & Time</label>
                <input type="datetime-local" name="return_at" id="returnAt" required>
            </div>

            

            <button type="submit">Submit</button>
        </form>


        
    </div>

    <script>
        let reservedPeriods = [
            @foreach($reservations as $reservation)
                { from: "{{ $reservation->borrowed_at }}", to: "{{ $reservation->return_at }}" },
            @endforeach
        ];
    
        function isUnavailable(date) {
            for (let period of reservedPeriods) {
                let start = new Date(period.from);
                let end = new Date(period.to);
                if (date >= start && date <= end) return true;
            }
            return false;
        }
    
        document.getElementById("borrowAt").addEventListener("change", function () {
            let selectedDate = new Date(this.value);
            if (isUnavailable(selectedDate)) {
                alert("This time is already reserved. Please choose another.");
                this.value = "";
            }
        });
    </script>
</body>

</html>
