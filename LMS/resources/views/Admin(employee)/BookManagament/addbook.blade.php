<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Book</title>
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
            margin-top: 160px
        }

        h1 {
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
        }

        input[type="text"], input[type="url"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="url"]:focus, select:focus {
            border-color: #6c63ff;
            outline: none;
        }

        .button {
            width: 100%;
            padding: 15px;
            background-color: #3E8DA8;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #3E8DA8;
        }

        .button-block {
            width: 100%;
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
            color: #3E8DA8;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            font-size: 16px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
  @include('layouts.AdminNavbar')
<div class="container">
    @include('common.alert')
    <div id="signup">
        <h1>Add a Book</h1>

        <form action="{{ route('AddBook') }}" method="get">
            @csrf

            <div class="top-row">
                <div class="field-wrap">
                    <label>
                        Book Title <span class="req">*</span>
                    </label>
                    <input name="book_title" type="text" required autocomplete="off" />
                </div>
                <div class="field-wrap">
                    <label>
                        ISBN <span class="req">*</span>
                    </label>
                    <input name="isbn" type="text" required autocomplete="off" />
                </div>
            </div>

            <div class="field-wrap">
                <label>
                    Publisher <span class="req">*</span>
                </label>
                <input name="publisher" type="text" required autocomplete="off" />
            </div>

            <div class="field-wrap">
                <label>
                    Language <span class="req">*</span>
                </label>
                <select name="language" id="">
                <option value="">Select</option>
                    @foreach ($languages as $language)
                        <option value="{{ $language->language_id }}">{{ $language->language_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="field-wrap">
                <label>
                    Year Published <span class="req">*</span>
                </label>
                <input name="year" type="text" required autocomplete="off" />
            </div>

            <div class="field-wrap">
                <label>
                    Category <span class="req">*</span>
                </label>
                <select name="category" id="role" required>
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->book_category_id}}">{{$category->book_category}}</option>
                    @endforeach
                
                </select>
            </div>

            <div class="field-wrap">
                <label>
                    Image URL <span class="req">*</span>
                </label>
                <input name="image" type="url" required autocomplete="off" />
            </div>

            <div class="field-wrap">
                <label>
                    Status <span class="req">*</span>
                </label>
                <select name="status" id="role" required>
                    <option value="">Select</option>
                    @foreach ($statuses as $status)
                    <option value="{{$status->book_status_id}}">{{$status->book_status}}</option>
                    @endforeach
                </select>
            </div>

            <div class="field-wrap">
                <label>
                    Fine Rate <span class="req">*</span>
                </label>
                <input name="fine_rate" type="text" required autocomplete="off" />
            </div>

            <div class="field-wrap">
                <label>
                    Total Copies <span class="req">*</span>
                </label>
                <input name="total_copies" type="text" required autocomplete="off" />
            </div>

            <button type="submit" class="button button-block">Add Book</button>
        </form>

        <a href="{{ route('DisplayBooks') }}">Return to Books List</a>
    </div>
</div>

</body>
</html>
