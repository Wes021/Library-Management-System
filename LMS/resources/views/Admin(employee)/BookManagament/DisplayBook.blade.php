<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>

    <h2>Books List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>ISBN</th>
                <th>Publisher</th>
                <th>Language</th>
                <th>Year</th>
                <th>Category</th>
                <th>Image</th>
                <th>Status</th>
                <th>Fine Rate</th>
                <th>Total Copies</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->book_id }}</td>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->ISBN }}</td>
                    <td>{{ $book->Publisher }}</td>
                    <td>{{ $book->language_name }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->book_category}}</td>
                    <td><img src="{{ $book->image_url }}" alt="Book Image"></td>
                    <td>{{ $book->book_status}}</td>
                    <td>{{ $book->fine_rate }}</td>
                    <td>{{ $book->total_copies }}</td>
                    <td><a href="{{ route('EditForm', ['book_id' => $book->book_id]) }}">Edit</a></td>
                    <td><a href="{{ route('DeleteBook',['book_id'=>$book->book_id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
