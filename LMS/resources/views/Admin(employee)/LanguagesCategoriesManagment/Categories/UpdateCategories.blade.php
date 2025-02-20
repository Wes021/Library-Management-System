<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Category</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .field-wrap {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        input[type="text"]:disabled {
            background-color: #f4f4f4;
            color: #888;
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #3498db;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 1.5rem;
            }

            input[type="text"] {
                font-size: 14px;
            }

            button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    @include('common.alert')
    <h2>Update Category</h2>

    <form action="{{ route('UpdateCa', $book_category->book_category_id) }}" method="POST">
        @csrf

        <div class="field-wrap">
            <label>Category ID</label>
            <input type="text" name="book_category_id" value="{{ $book_category->book_category_id }}" required disabled>
        </div>

        <div class="field-wrap">
            <label>Category Name</label>
            <input type="text" name="book_category" value="{{ $book_category->book_category }}" required>
        </div>

        <button type="submit">Update Category</button>
    </form>

    <a href="{{ route('DisplayCategories') }}">Back</a>
</div>

</body>
</html>
