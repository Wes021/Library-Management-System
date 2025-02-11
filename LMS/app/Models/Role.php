<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles'; // Ensure this matches your actual table name
    protected $primaryKey = 'role_id'; // Adjust based on your database
    public $timestamps = false;

    protected $fillable = [

        'role_name',
    ];
}
