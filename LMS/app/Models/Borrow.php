<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrowing';
    public $incrementing = false;
    protected $primaryKey = 'borrow_id';

    protected $fillable = [
        'borrow_id',
        'book_id',
        'user_id',
        'return_at',
        'borrowed_at',
        'due_date',
        'fine'
    ];

}
