<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .field-wrap {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, select:focus {
            border-color: #6c63ff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #6c63ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #5a54e3;
        }

        .req {
            color: red;
        }

        .top-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .top-row .field-wrap {
            flex: 1;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            color: #6c63ff;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Book</h2>

    <form action="{{ route('UpdateBook', $book->book_id) }}" method="POST">
        @csrf

        <div class="field-wrap">
            <label>Book ID</label>
            <input type="text" name="book_id" value="{{ $book->book_id }}" required disabled>
        </div>

        <div class="field-wrap">
            <label>Title:</label>
            <input type="text" name="book_title" value="{{ $book->book_title }}" required>
        </div>

        <div class="field-wrap">
            <label>ISBN:</label>
            <input type="text" name="ISBN" value="{{ $book->ISBN }}" required>
        </div>

        <div class="field-wrap">
            <label>Publisher:</label>
            <input type="text" name="Publisher" value="{{ $book->Publisher }}" required>
        </div>

        <div class="field-wrap">
            <label>Language:</label>
            <select name="Language" required>
                <option value="">Select</option>
                <option value="1" {{ $book->Language == 1 ? 'selected' : '' }}>Arabic</option>
                <option value="2" {{ $book->Language == 2 ? 'selected' : '' }}>English</option>
                <option value="3" {{ $book->Language == 3 ? 'selected' : '' }}>German</option>
            </select>
        </div>

        <div class="field-wrap">
            <label>Year:</label>
            <input type="text" name="year" value="{{ $book->year }}" required>
        </div>

        <div class="field-wrap">
            <label>Category:</label>
            <select name="category" required>
                <option value="">Select</option>
                <option value="1" {{ $book->category == 1 ? 'selected' : '' }}>Science</option>
                <option value="2" {{ $book->category == 2 ? 'selected' : '' }}>Art</option>
                <option value="3" {{ $book->category == 3 ? 'selected' : '' }}>Chemistry</option>
            </select>
        </div>

        <div class="field-wrap">
            <label>Image URL:</label>
            <input type="text" name="image_url" value="{{ $book->image_url }}">
        </div>

        <div class="field-wrap">
            <label>Status:</label>
            <select name="status" required>
                <option value="">Select</option>
                <option value="1" {{ $book->status == 1 ? 'selected' : '' }}>Available</option>
                <option value="2" {{ $book->status == 2 ? 'selected' : '' }}>Not Available</option>
                <option value="3" {{ $book->status == 3 ? 'selected' : '' }}>Damaged</option>
            </select>
        </div>

        <div class="field-wrap">
            <label>Fine Rate:</label>
            <input type="text" name="fine_rate" value="{{ $book->fine_rate }}" required>
        </div>

        <div class="field-wrap">
            <label>Total Copies:</label>
            <input type="text" name="total_copies" value="{{ $book->total_copies }}" required>
        </div>

        <button type="submit">Update Book</button>
    </form>

    <a href="{{ route('DisplayBooks') }}">Back to Books List</a>
</div>

</body>
</html>
