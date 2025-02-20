<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'days' => 'required|integer|min:1|max:30',
        ]);


        $borrowDate = now(); // Get current date
        $dueDate = Carbon::now()->addDays((int) $request->days);

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

        

        ////////////////////////////////////Check if the user is already borrowing////////////////////////////////////

        $checkUserBorrow = DB::table('borrowing')
            ->where('user_id', $validated['user_id'])
            ->where('borrow_status_id', 7) // Ensures user has an active borrow
            ->exists();
        ////////////////////////////////////Check if the user is already borrowing////////////////////////////////////

        $checkbook= DB::table('book')
        ->where('book_id', $validated['book_id'])
        ->where('status', 1)
        ->exists();


        $checkuser=DB::table('user')
        ->where('user_id', $validated['user_id'])
        ->where('status', 1)
        ->exists();


        // Store in database
        if ($checkuser) {
                if ($checkbook) {
                            if (!$checkUserBorrow) {
                                    Borrow::create([
                                        'borrow_id' => $borrowID,
                                        'book_id' => $validated['book_id'],
                                        'user_id' => $validated['user_id'],
                                        'borrowed_at' => $borrowDate,
                                        'due_date' => $dueDate
                                        ]);
                                                
                                        DB::table('book')
                                        ->where('book_id', $validated['book_id'])
                                        ->update(['status' => 2]);

                                        return redirect()->route('DisplayBorrow')->with('success', 'Book Borrowed successfully!');
                                            } else {
                                                return redirect()->back()->with('error', 'You Are Already borrowing, you cant borrow more than a book');
                                                }
                } else {
                    return redirect()->back()->with('error', 'This Book is not available');
                        }
        } else {
            return redirect()->back()->with('error', 'Your Account is Suspended, Contact the Managment');
        }
    }

    public function DisplayBorrows()
    {
        $user_id = Auth::user()->user_id;

        $borrows = DB::table('borrowing')
            ->where('user_id', $user_id)
            ->leftJoin('book', 'borrowing.book_id', '=', 'book.book_id')
            ->leftJoin('borrow_status', 'borrowing.borrow_status_id', '=', 'borrow_status.borrow_status_id')
            ->select(
                'borrowing.*',
                'book.book_title',
                'book.ISBN',
                'book.book_id',
                'borrow_status.borrow_status'
            )
            ->get();

        if (!$borrows) {
        }

        return view('user.BorrowDetails', compact('borrows'));
    }


    public function DeleteBorrow($borrow_id)
    {
        $borrow = Borrow::findOrfail($borrow_id);

        if ($borrow->delete()) {
            DB::table('book')
            ->where('book_id', $borrow->book_id)
            ->update(['status' => 1]);

            return redirect()->back()->with('success', 'The Borrow deleted successfully!');
        }
    }


    public function returnBorrow($borrow_id)
    {
        $borrow = DB::table('borrowing')->where('borrow_id', $borrow_id)->first();
        $returnDate = now();

        // Calculate overdue days correctly
        $overdueDays = $returnDate->greaterThan($borrow->due_date) ? $returnDate->diffInDays($borrow->due_date) : 0;

        // Define fine per day
        $finePerDay = 1; // You can change this amount

        // Calculate total fine
        $fine = $overdueDays * $finePerDay;

        // Update record in database
        $borroww=DB::table('borrowing')
            ->where('borrow_id', $borrow_id)
            ->update([
                'return_at' => $returnDate,
                'fine' => $fine,
                'borrow_status_id' => 6,
                'updated_at' => now()
            ]);

        
        $book=DB::table('book')
        ->where('book_id',$borrow->book_id)
        ->update(['status' => 1]);

        if($borroww && $book){
            return redirect()->back()->with('success', 'Book returned! Fine: $' . $fine);
        }else{
            return redirect()->back()->with('error', 'Book return proccess faild!, Please try agian');
        }

        
    }


    public function updateBorrowStatuses()
    {
        // Get current date
        $today = Carbon::now();


       $status= DB::table('borrowing')
            ->where('due_date', '<', $today)
            ->where('borrow_status_id', 7)
            ->update([
                'borrow_status_id' => 8,
                'updated_at' => now()
            ]);

        if($status){
            return redirect()->back()->with('success', 'Be aware you just Exceeded you borrow duration');
        }
    }
}
