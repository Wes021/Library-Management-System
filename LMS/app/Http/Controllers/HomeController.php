<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $books = DB::table('book')
            ->leftJoin('language', 'book.Language', '=', 'language.language_id')
            ->leftJoin('book_category', 'book.category', '=', 'book_category.book_category_id')
            ->leftJoin('book_status', 'book.status', '=', 'book_status.book_status_id')
            ->select('book.*', 'language.language_name as language_name', 'book_category.book_category as book_category', 'book_status.book_status as book_status')
            ->get();
        return view('home', compact('books'));
    }


    public function BookDetails($book_id)
    {
        


        $book = DB::table('book')->where('book_id', $book_id)
            ->leftJoin('language', 'book.Language', '=', 'language.language_id')
            ->leftJoin('book_category', 'book.category', '=', 'book_category.book_category_id')
            ->leftJoin('book_status', 'book.status', '=', 'book_status.book_status_id')
            ->select('book.*', 'language.language_name as language_name', 'book_category.book_category as book_category', 'book_status.book_status as book_status')
            ->first();
        return view('BookDetail', compact('book'));
    }
}
