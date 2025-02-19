<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrowed Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .search-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        input, select {
            padding: 10px;
            width: 48%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background: #007BFF;
            color: white;
        }
        .status-borrowed {
            color: green;
            font-weight: bold;
        }
        .status-exceeded {
            color: red;
            font-weight: bold;
        }
        .status-returned {
            color: aqua;
            font-weight: bold;
        }
        .actions a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 10px;
        }
    </style>
    <script>
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll(".book-row");
            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
        function filterStatus() {
    let filter = document.getElementById("statusFilter").value;
    let rows = document.querySelectorAll(".book-row");
    rows.forEach(row => {
        let statusCell = row.querySelector(".status-cell");
        let status = statusCell ? statusCell.innerText.trim() : "";
        row.style.display = (filter === "" || status === filter) ? "" : "none";
    });
}
    </script>
</head>
<body>
    <div class="container">
        <h2>Borrowed Books</h2>
        <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search...">
            <select id="statusFilter" onchange="filterStatus()">
                <option value="">All Statuses</option>
                <option value="Borrowed">Borrowed</option>
                <option value="Exceeded">Exceeded</option>
                <option value="Returned">Returned</option>
            </select>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Borrow ID</th>
                    <th>Book ID</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Borrowed</th>
                    <th>Due</th>
                    <th>Fine</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="booksTable">
                @foreach ($borrows as $borrow)
                    <tr class="book-row">
                        <td>{{ $borrow->borrow_id }}</td>
                        <td>{{ $borrow->book_id }}</td>
                        <td>{{ $borrow->ISBN }}</td>
                        <td>{{ $borrow->title }}</td>
                        <td>{{ $borrow->user_id }}</td>
                        <td>{{ $borrow->name }}</td>
                        <td>{{ $borrow->email }}</td>
                        <td>{{ $borrow->phone_number }}</td>
                        <td>{{ $borrow->borrowed_at }}</td>
                        <td>{{ $borrow->due_date }}</td>
                        <td>{{ $borrow->fine }}</td>
                        <td class="status-cell 
                        @if($borrow->borrow_status_id == 7) status-returned 
                        @elseif($borrow->borrow_status_id == 8) status-exceeded 
                        @else status-borrowed @endif">
                        {{ $borrow->borrow_status }}
                    </td>
                        <td class="actions">
                            <a href="{{ route('EditForme', ['book_id' => $borrow->book_id]) }}">Edit</a> |
                            <a href="{{ route('DeleteBook', ['book_id' => $borrow->book_id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="">Return</a>
    </div>
</body>
</html>
