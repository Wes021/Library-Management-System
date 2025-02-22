<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Home</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #2980b9;
        }
        .search-bar-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }
        .search-bar {
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-right: 10px;
            box-sizing: border-box;
            outline: none;
        }
        .search-bar:focus {
            border-color: #2980b9;
        }
        .search-bar-icon {
           
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        .book-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .book {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .book:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .book img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .book h3 {
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .book p {
            font-size: 0.9rem;
            color: #555;
        }
        .book p span {
            font-weight: bold;
        }
        .book-category {
            background-color: #2980b9;
            color: white;
            padding: 5px;
            border-radius: 5px;
            font-size: 0.8rem;
        }
        .book-status {
            padding: 5px;
            font-size: 0.8rem;
            border-radius: 5px;
            color: white;
        }
        .available {
            background-color: #2ecc71; /* Green */
        }
        .not-available {
            background-color: #e74c3c; /* Red */
        }
        .damaged {
            background-color: #e74c3c; /* Red */
        }
        @media (max-width: 768px) {
            .search-bar {
                width: 70%;
            }
        }
    </style>
</head>
<body>

@include('layouts.NavSidebarUser') <!-- Navbar is included -->

<div class="container">
    @include('common.alert')
    <h1>Library Collection</h1>

    <div class="search-bar-container">
        <input type="text" id="search" class="search-bar" placeholder="Search books by name, author, ISBN..." onkeyup="filterBooks()">
        <span class="search-bar-icon">&#128269;</span>
    </div>

    <div class="book-list">
        @if ($books->isEmpty())
            <p style="text-align: center; font-size: 1.2rem; color: #888;">No books available.</p>
        @else
            @foreach ($books as $book)
                <div class="book" onclick="location.href='{{ route('BookDetails', $book->book_id) }}'">
                    <img src="{{ $book->image_url }}" alt="N/A">
                    <h3>{{ $book->book_title }}</h3>
                    <p><span>Author:</span> {{ $book->Publisher }}</p>
                    <p><span>ISBN:</span> {{ $book->ISBN }}</p>
                    <p><span>Language:</span> {{ $book->language_name }}</p>
                    <p><span>Category:</span> {{ $book->book_category }}</p>
                    <p class="book-status
                        @if($book->status == 1)
                            available
                        @elseif($book->status == 2 || $book->book_status == 3)
                            damaged
                        @else
                            not-available
                        @endif
                    ">
                        {{ $book->book_status }}
                    </p>
                </div>
            @endforeach
        @endif
    </div>
    
</div>

<script>
    function filterBooks() {
        let input = document.getElementById('search').value.toLowerCase();
        let books = document.querySelectorAll('.book');

        books.forEach(book => {
            let title = book.querySelector('h3').innerText.toLowerCase();
            let author = book.querySelector('p').innerText.toLowerCase();
            let isbn = book.querySelector('p').innerText.toLowerCase();

            if (title.includes(input) || author.includes(input) || isbn.includes(input)) {
                book.style.display = "block";
            } else {
                book.style.display = "none";
            }
        });
    }
</script>

</body>
</html>
