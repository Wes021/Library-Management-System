<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Language</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
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
            display: block;
            font-size: 1rem;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #3498db;
        }

        .top-row {
            display: flex;
            justify-content: space-between;
        }

        .field-wrap input:disabled {
            background-color: #f4f4f4;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            h2 {
                font-size: 1.5rem;
            }

            button {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    @include('common.alert')
    <h2>Add Language</h2>

    <form action="{{ route('AddLanguage') }}" method="get">
        @csrf

        <div class="top-row">
            <div class="field-wrap">
                <label>ID <span class="req">*</span></label>
                <input name="book_title" type="text" value="Automatically generated" required autocomplete="off" disabled />
            </div>
        </div>

        <div class="field-wrap">
            <label>Name <span class="req">*</span></label>
            <input name="language_name" type="text" required autocomplete="off" />
        </div>

        <button type="submit">Add Language</button>
    </form>
    <a href="{{ route('DisplayLanguages') }}">Back</a>
</div>

</body>
</html>
