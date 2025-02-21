<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <style>
        /* Same styles as before */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 1900px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 150px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .search-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
        }

        .search-bar input,
        .search-bar select {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 200px;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        img {
            max-width: 50px;
            height: auto;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    @include('layouts.AdminNavbar')
    
    <div class="container">
        @include('common.alert')
        <h2>Books List</h2>

        <a href="{{ route('Addbook') }}">Add a book</a>
        <!-- Search and Filter Bar -->
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search by Book Name, Author, ID, ISBN"
                onkeyup="applyFilters()">
            <select id="languageFilter" onchange="applyFilters()">
                <option value="">All Languages</option>
                <option value="English">English</option>
                <option value="French">French</option>
            </select>
            <select id="yearFilter" onchange="applyFilters()">
                <option value="">All Years</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
            </select>
            <select id="statusFilter" onchange="applyFilters()">
                <option value="">All Status</option>
                <option value="available">Available</option>
                <option value="not available">Not available</option>
            </select>
            <select id="categoryFilter" onchange="applyFilters()">
                <option value="">All Categories</option>
                <option value="Science">Science</option>
                <option value="Fiction">Fiction</option>
            </select>
        </div>

        <!-- Books Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>Publisher</th>
                    <th>Language</th>
                    <th>Year</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Fine Rate</th>
                    <th>Total Copies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="booksTable">
                @foreach ($books as $book)
                    <tr class="book-row">
                        <td>{{ $book->book_id }}</td>
                        <td>{{ $book->book_title }}</td>
                        <td>{{ $book->ISBN }}</td>
                        <td>{{ $book->Publisher }}</td>
                        <td>{{ $book->language_name }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->book_category }}</td>
                        <td><img src="{{ $book->image_url }}" alt="Book Image"></td>
                        <td>{{ $book->book_status }}</td>
                        <td>{{ $book->fine_rate }}</td>
                        <td>{{ $book->total_copies }}</td>
                        <td>
                            <a href="{{ route('EditForm', ['book_id' => $book->book_id]) }}">Edit</a> |
                            <a href="{{ route('DeleteBook', ['book_id' => $book->book_id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('AdminDashboard') }}">Return</a>
    </div>

    <script>
        function applyFilters() {
            const searchQuery = document.getElementById('searchInput').value.toLowerCase();
            const language = document.getElementById('languageFilter').value.toLowerCase();
            const year = document.getElementById('yearFilter').value;
            const status = document.getElementById('statusFilter').value;
            const category = document.getElementById('categoryFilter').value.toLowerCase();

            const rows = document.querySelectorAll('.book-row');
            rows.forEach(row => {
                const bookId = row.cells[0].textContent.toLowerCase();
                const title = row.cells[1].textContent.toLowerCase();
                const author = row.cells[2].textContent.toLowerCase(); // You can add an author column if needed
                const isbn = row.cells[2].textContent.toLowerCase();
                const bookLanguage = row.cells[4].textContent.toLowerCase();
                const bookYear = row.cells[5].textContent;
                const bookStatus = row.cells[8].textContent.toLowerCase();
                const bookCategory = row.cells[6].textContent.toLowerCase();

                const matchesSearch = (title.includes(searchQuery) || author.includes(searchQuery) || bookId
                    .includes(searchQuery) || isbn.includes(searchQuery));
                const matchesLanguage = !language || bookLanguage.includes(language);
                const matchesYear = !year || bookYear.includes(year);
                const matchesStatus = !status || bookStatus.includes(status);
                const matchesCategory = !category || bookCategory.includes(category);

                if (matchesSearch && matchesLanguage && matchesYear && matchesStatus && matchesCategory) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>

</body>

</html>
