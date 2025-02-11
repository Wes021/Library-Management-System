<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserServices extends Controller
{
    public function BorrowBookForm($book_id, $user_id)
    {
        $user = User::findOrFail($user_id);

        $book = DB::table('book')
            ->where('book_id', $book_id)
            ->leftJoin('book_status', 'book.status', '=', 'book_status.book_status_id')
            ->select('book.*', 'book_status.book_status as book_status')
            ->first();


        return view('BorrowBookForm', compact('user', 'book'));
    }

    public function NewBorrow(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required',
            'user_id' => 'required',
            'borrowed_at' => 'required',
            'return_at' => 'required',
        ]);

        $book_id = strval($validated['book_id']);
        $user_id = strval($validated['user_id']);

        // Get the latest borrow record
        $lastBorrow = Borrow::latest('borrow_id')->first();

        // If no records exist, start with 001; otherwise, extract and increment last borrow number
        $nextBorrowNumber = $lastBorrow ? intval(substr($lastBorrow->borrow_id, -3)) + 1 : 1;

        // Ensure the borrow number is always 3 digits (e.g., 001, 002, ..., 999)
        $borrowNumber = str_pad($nextBorrowNumber, 3, '0', STR_PAD_LEFT);

        // Generate unique borrow_id
        $borrowID = intval($book_id . $user_id . $borrowNumber);

        // Store in database
        Borrow::create([
            'borrow_id' => $borrowID,
            'book_id' => $validated['book_id'],
            'user_id' => $validated['user_id'],
            'borrowed_at' => $validated['borrowed_at'],
            'return_at' => $validated['return_at']
        ]);

        return response()->json([
            'message' => 'Book borrowed successfully',
            'borrow_id' => $borrowID
        ]);
    }
}
