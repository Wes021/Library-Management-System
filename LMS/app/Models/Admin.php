<?php

namespace App\Models;
use App\Models\Role;


use Illuminate\Database\Eloquent\Model;
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

    public function hasRole(string $roleName): bool
{
    return Role::where('role_id', $this->role_id)->value('role_name') === $roleName;
}

}
