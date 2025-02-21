<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Category List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 170px
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
            text-align: left;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        td {
            background-color: #fff;
        }

        img {
            max-width: 50px;
            height: auto;
        }

        .action-links {
            display: flex;
            justify-content: space-around;
        }

        .action-links a {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: #2980b9;
            transition: 0.3s;
        }

        .action-links a:hover {
            background-color: #ecf0f1;
        }

        .action-links a.delete {
            color: #e74c3c;
        }

        .action-links a.delete:hover {
            color: #c0392b;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 1.5rem;
            }

            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.AdminNavbar')

<div class="container">
    @include('common.alert')
    <h2>Books Category List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book_categories as $book_category)
                <tr>
                    <td>{{ $book_category->book_category_id }}</td>
                    <td>{{ $book_category->book_category }}</td>
                    <td class="action-links">
                        <a href="{{ route('EditCategoriesForm', ['book_category_id' => $book_category->book_category_id]) }}">Edit</a>
                        
                        <a href="{{ route('DeleteCategory', ['book_category_id' => $book_category->book_category_id]) }}" class="delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('Addcategory') }}" class="btn-add">Add New Category</a><br>
    <a href="{{ route('AdminDashboard') }}">Return</a>
</div>

</body>
</html>
