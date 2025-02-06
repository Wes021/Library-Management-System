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
                
            </tr>
        </thead>
        <tbody>
            @foreach ($book_categories as $book_category)
                <tr>
                    <td>{{ $book_category->book_category_id }}</td>
                    <td>{{ $book_category->book_category }}</td>
                    
                    <td><a href="{{ route('EditForm', ['book_category_id' => $book_category->book_category_id]) }}">Edit</a></td>
                    <td><a href="{{ route('DeleteCategory',['book_category_id'=>$book_category->book_category_id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
