<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Book_category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookManagament extends Controller
{

    public function index(){
        $languages=Language::all();

        $categories=Book_category::all();

        $statuses=DB::table('book_status')
        ->select('book_status.*')
        ->get();

        return view('Admin(employee).BookManagament.addbook', compact('languages','categories','statuses'));
    }

    public function AddBook(Request $request)
    {
        $validated = $request->validate([
            'book_title' => 'required',
            'isbn' => 'required|unique:book,ISBN',
            'publisher' => 'required',
            'language' => 'required',
            'year' => 'required',
            'category' => 'required',
            'image' => 'required',
            'status' => 'required',
            'fine_rate' => 'required',
            'total_copies' => 'required',

        ]);

        do {
            $randomId = random_int(1000, 9999);
        } while (Book::where('book_id', $randomId)->exists());

       $book= Book::create([
            'book_id' => $randomId,
            'book_title' => $validated['book_title'],
            'ISBN' => $validated['isbn'],
            'Publisher' => $validated['publisher'],
            'Language' => $validated['language'],
            'year' => $validated['year'],
            'category' => $validated['category'],
            'image_url' => $validated['image'],
            'status' => $validated['status'],
            'fine_rate' => $validated['fine_rate'],
            'total_copies' => $validated['total_copies'],
        ]);


        if($book){
            return redirect()->route('Addbook')->with(['success' => 'New Book was Added!']);

        }else{
            return redirect()->back()->with(['error' => 'Adding Book failed!, please try again']);
        }
    }

    public function DisplayBooks()
    {
        $books = DB::table('book')
            ->leftjoin('language', 'book.Language', '=', 'language.language_id')
            ->leftJoin('book_category', 'book.category', '=', 'book_category.book_category_id')
            ->leftJoin('book_status', 'book.status', '=', 'book_status.book_status_id')
            ->select('book.*', 'language.language_name as language_name', 'book_category.book_category as book_category', 'book_status.book_status as book_status')
            ->get();


        return view('Admin(employee).BookManagament.DisplayBook', compact('books'));
    }

    public function EditForm($book_id)
    {
        $book = Book::findOrFail($book_id);
        return view('Admin(employee).BookManagament.Updatebook', compact('book'));
    }

    public function UpdateBook(Request $request, $book_id)
    {
        $book = Book::findOrFail($book_id);

        $update=$book->update([
            'book_title' => $request->book_title,
            'ISBN' => $request->ISBN,
            'Publisher' => $request->Publisher,
            'Language' => $request->Language,
            'year' => $request->year,
            'category' => $request->category,
            'image_url' => $request->image_url,
            'status' => $request->status,
            'fine_rate' => $request->fine_rate,
            'total_copies' => $request->total_copies,
        ]);

        if($update){
            return redirect()->route('DisplayBooks')->with('success', 'Book updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Book update faild!');
        }

        
    }

    public function DeleteBook($book_id)
    {
        $book = Book::findOrFail($book_id);
        if ($book->delete()) {
            return redirect()->route('DisplayBooks')->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->route('DisplayBooks')->with('error', 'Book deletion faild!');
        }
    }
}
