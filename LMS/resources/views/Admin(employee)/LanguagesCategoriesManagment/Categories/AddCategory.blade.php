<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
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

        .req {
            color: red;
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
    <h2>Add Category</h2>

    <form action="{{ route('AddCategory') }}" method="get">
        @csrf

        <div class="field-wrap">
            <label>
                ID <span class="req">*</span>
            </label>
            <input name="book_title" type="text" value="Automatically generated" required autocomplete="off" disabled />
        </div>

        <div class="field-wrap">
            <label>
                Name <span class="req">*</span>
            </label>
            <input name="category_name" type="text" required autocomplete="off" />
        </div>

        <button type="submit">Add Category</button>
    </form>
    <a href="{{ route('DisplayCategories') }}">Back</a>
</div>

</body>
</html>
