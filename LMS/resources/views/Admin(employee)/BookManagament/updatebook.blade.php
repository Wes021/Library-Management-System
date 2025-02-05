<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>

    <h2>Edit Book</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('UpdateBook', $book->book_id) }}" method="POST">
        @csrf

        <label>Book ID</label>
        <input type="text" name="book_title" value="{{ $book->book_id }}" required disabled><br>

        <label>Title:</label>
        <input type="text" name="book_title" value="{{ $book->book_title }}" required><br>

        <label>ISBN:</label>
        <input type="text" name="ISBN" value="{{ $book->ISBN }}" required><br>

        <label>Publisher:</label>
        <input type="text" name="Publisher" value="{{ $book->Publisher }}" required><br>


        <label>
            Language<span class="req">*</span>
        </label>
        
        <select name="Language" id="role">
            <option value="">Select</option>
            <option value="1" {{ $book->Language == 1 ? 'selected' : '' }}>Arabic</option>
            <option value="2" {{ $book->Language == 2 ? 'selected' : '' }}>English</option>
            <option value="3" {{ $book->Language == 3 ? 'selected' : '' }}>German</option>
        </select>

        <label>Year:</label>
        <input type="text" name="year" value="{{ $book->year }}" required><br>

        <label>
            Category<span class="req">*</span>
          </label>
          
          <select name="category" id="role">
            <option value="">Select</option>  
            <option value="1" {{ $book->category == 1 ? 'selected' : '' }}>Sience</option>
            <option value="2" {{ $book->category == 2 ? 'selected' : '' }}>Art</option>
            <option value="3" {{ $book->category == 3 ? 'selected' : '' }}>Chimistry</option>
  
          </select><br>

        <label>Image URL:</label>
        <input type="text" name="image_url" value="{{ $book->image_url }}"><br>

        <label>
            Status<span class="req">*</span>
          </label>
          
          <select name="status" id="role">
            <option value="">Select</option>
            <option value="1" {{ $book->status == 1 ? 'selected' : '' }}>Available</option>
            <option value="2" {{ $book->status == 2 ? 'selected' : '' }}>Not Available</option>
            <option value="3" {{ $book->status == 3 ? 'selected' : '' }}>Damaged</option>
  
          </select><br>

        <label>Fine Rate:</label>
        <input type="text" name="fine_rate" value="{{ $book->fine_rate }}" required><br>

        <label>Total Copies:</label>
        <input type="text" name="total_copies" value="{{ $book->total_copies }}" required><br>

        <button type="submit">Update Book</button>
    </form>

    <a href="{{ url('/books') }}">Back to Books List</a>

</body>
</html>
