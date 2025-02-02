<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
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
    ];
}
