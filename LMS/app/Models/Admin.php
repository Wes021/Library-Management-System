<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'Admin';
    public $incrementing = false;
    protected $fillable = [
        'admin_id',
        'name',
        'email',
        'password',
        'phone_number',
        'gender',
        'role_id',
    ];

    
}

