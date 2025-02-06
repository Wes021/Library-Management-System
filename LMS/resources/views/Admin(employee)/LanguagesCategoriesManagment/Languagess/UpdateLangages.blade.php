<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('UpdateLanguages', $language->language_id) }}" method="POST">
        @csrf

        <label>Language ID</label>
        <input type="text" name="book_category_id" value="{{ $language->language_id }}" required disabled><br>

        <label>Language name</label>
        <input type="text" name="language_name" value="{{ $language->language_name }}" required><br> 
        <button type="submit">Update language</button>
    </form>    
</body>
</html>