<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-bar {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .book-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .book {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
        }
        .book:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Library Books</h1>
        <input type="text" id="search" class="search-bar" placeholder="Search books..." onkeyup="filterBooks()">
        <div class="book-list">
            @foreach ($books as $book)
                <div class="book" onclick="location.href='{{ route('BookDetails' , $book->book_id) }}'">
                    <img src="{{$book->image_url}}" alt="N/A"></img>
                    <h3>{{ $book->book_title }}</h3>
                    <p>by {{ $book->Publisher }}</p>
                    <p>Language:{{$book->language_name}}</p>
                    <p>Category: {{$book->book_category}}</p>
                    <p>status: {{$book->book_status}}</p>

                </div>
            @endforeach
        </div>
    </div>

    <script>
        function filterBooks() {
            let input = document.getElementById('search').value.toLowerCase();
            let books = document.querySelectorAll('.book');

            books.forEach(book => {
                let title = book.querySelector('h3').innerText.toLowerCase();
                if (title.includes(input)) {
                    book.style.display = "block";
                } else {
                    book.style.display = "none";
                }
            });
        }
    </script>
</body>
</html>
