<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->book_title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 50px;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $book->book_title }}</h1>
        <img src="{{ $book->image_url }}" alt="N/A">
        <p><strong>Author:</strong> {{ $book->Publisher }}</p>
        <p><strong>Language:</strong> {{ $book->language_name }}</p>
        <p><strong>Year:</strong> {{ $book->year }}</p>
        <p><strong>Category:</strong> {{ $book->book_category }}</p>
        <p><strong>Status:</strong> {{ $book->book_status }}</p>
        <p><strong>Fine Rate:</strong> {{ $book->fine_rate }}</p>
        <p><strong>Total Copies:</strong> {{ $book->total_copies }}</p>
        <a href="{{ route('/') }}" class="back">Back to Home</a>
        @if (Auth::check())
            <a href="{{ route('BorrowBookForm', ['book_id' => $book->book_id, 'user_id' => Auth::user()->user_id]) }}"
                class="back">Borrow this book</a>
        @endif

    </div>
</body>

</html>
