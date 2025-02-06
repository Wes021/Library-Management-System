<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_category extends Model
{
    protected $table = 'book_category';
    public $incrementing = false;
    protected $primaryKey = 'book_category_id';
    public $timestamps = false;


    protected $fillable = [
        'book_category_id',
        'book_category',
    ];

}
