<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
    public $incrementing = false;
    protected $primaryKey = 'language_id';
    public $timestamps = false;

    protected $fillable = [
        'language_id',
        'language_name',
    ];
}
