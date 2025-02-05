<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    public $incrementing = false;
    protected $primaryKey = 'book_id';
    protected $fillable = [
        'book_id',
        'book_title',
        'ISBN',
        'Publisher',
        'Language',
        'year',
        'category',
        'image_url',
        'status',
        'fine_rate',
        'total_copies',
    ];
}
