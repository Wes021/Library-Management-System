<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'user_id'; // Ensure Laravel knows this is the primary key
    public $incrementing = false; // Prevent Laravel from auto-incrementing it
    protected $keyType = 'int'; // Ensure it is treated as an integer

    // ✅ Make user_id fillable so Laravel allows it in mass assignment
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'phone_number',
        'status',
        'gender',
        'profile_picture',
    ];
}
