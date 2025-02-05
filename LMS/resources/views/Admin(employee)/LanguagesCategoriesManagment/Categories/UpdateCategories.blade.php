<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('UpdateCa', $book_category->book_category_id) }}" method="POST">
        @csrf

        <label>Category ID</label>
        <input type="text" name="book_category_id" value="{{ $book_category->book_category_id }}" required disabled><br>

        <label>Category name</label>
        <input type="text" name="book_category" value="{{ $book_category->book_category }}" required><br> 
        <button type="submit">Update Book</button>
    </form>    
</body>
</html>