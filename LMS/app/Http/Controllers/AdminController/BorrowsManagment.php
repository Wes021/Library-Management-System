<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowsManagment extends Controller
{
    public function DisplayBorrows(){
        $borrows = DB::table('borrowing')
            ->leftJoin('user', 'borrowing.user_id','=', 'user.user_id')
            ->leftJoin('book', 'borrowing.book_id', '=', 'book.book_id')
            ->leftJoin('borrow_status', 'borrowing.borrow_status_id', '=', 'borrow_status.borrow_status_id')
            ->select(
                'borrowing.*',
                'book.book_title as title',
                'book.ISBN',
                'book.book_id',
                'borrow_status.borrow_status',
                'user.*'
            )
            ->get();

        return view('Admin(employee).BorrowManagment.DisplayBorrows', compact('borrows'));
    }


}
