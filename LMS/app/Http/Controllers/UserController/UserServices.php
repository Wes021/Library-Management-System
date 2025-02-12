<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserServices extends Controller
{
    public function BorrowBookForm($book_id, $user_id)
    {
        $user = User::findOrFail($user_id);

        $reservations = DB::table('borrowing')
            ->orderBy('borrowed_at', 'asc')
            ->orderBy('return_at', 'asc')
            ->get();

        $book = DB::table('book')
            ->where('book_id', $book_id)
            ->leftJoin('book_status', 'book.status', '=', 'book_status.book_status_id')
            ->select('book.*', 'book_status.book_status as book_status')
            ->first();


        return view('BorrowBookForm', compact('user', 'book', 'reservations'));
    }




    public function NewBorrow(Request $request)
    {
        $validated = $request->validate([
            'book_id' => '',
            'user_id' => '',
            'borrowed_at' => 'required',
            'return_at' => 'required',
        ]);
        ////////////////////////////////////converting the date to a proper data type in the DB////////////////////////////////////
        $borrowedAt = Carbon::parse($validated['borrowed_at'])->format('Y-m-d H:i:s');
        $returnAt = Carbon::parse($validated['return_at'])->format('Y-m-d H:i:s');
        ////////////////////////////////////converting the date to a proper data type in the DB////////////////////////////////////

        //////////////////////////////////// To generate a proper ID for the borrow////////////////////////////////////
        $book_id = strval($validated['book_id']);
        $user_id = strval($validated['user_id']);

        // Get the latest borrow record
        $lastBorrow = Borrow::latest('borrow_id')->first();

        // If no records exist, start with 001; otherwise, extract and increment last borrow number
        $nextBorrowNumber = $lastBorrow ? intval(substr($lastBorrow->borrow_id, -3)) + 1 : 1;

        // Ensure the borrow number is always 3 digits (e.g., 001, 002, ..., 999)
        $borrowNumber = str_pad($nextBorrowNumber, 3, '0', STR_PAD_LEFT);


        $borrowID = intval($book_id . $user_id . $borrowNumber);
        //////////////////////////////////// To generate a proper ID for the borrow////////////////////////////////////

        ////////////////////////////////////Check the available duration////////////////////////////////////
        $overlap = DB::table('borrowing')
        ->where('book_id', $validated['book_id'])
        ->where(function ($query) use ($borrowedAt, $returnAt) {
            $query->whereBetween('borrowed_at', [$borrowedAt, $returnAt])
                  ->orWhereBetween('return_at', [$borrowedAt, $returnAt]);
        })
        ->exists();

        if ($overlap) {
            return response()->json(['error' => 'This book is already reserved for the selected period.'], 400);
        }

        ////////////////////////////////////Check the available duration////////////////////////////////////

        ////////////////////////////////////Check if the user is already borrowing////////////////////////////////////

        $checkUser = DB::table('borrowing')
            ->where('user_id', $validated['user_id'])
            ->where('borrow_status_id', 5) // Ensures user has an active borrow
            ->exists();
        ////////////////////////////////////Check if the user is already borrowing////////////////////////////////////


        // Store in database
        if (!$overlap && !$checkUser) {
            Borrow::create([
                'borrow_id' => $borrowID,
                'book_id' => $validated['book_id'],
                'user_id' => $validated['user_id'],
                'borrowed_at' => $borrowedAt,
                'return_at' => $returnAt
            ]);

            return response()->json([
                'message' => 'Book borrowed successfully',
                'borrow_id' => $borrowID
            ]);
        } else{
            return response()->json([
                'message' => 'Book borrowing Faild',
                
            ]);
        }
    }
}
