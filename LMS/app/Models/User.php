<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (!isset($this->attributes['user_id'])) {
            $this->attributes['user_id'] = $this->generateUniqueId();
        }

        
    }
    protected $fillable=[
        'name',
        'email',
        'password',
        'gender',
        'phone_number',
        'profile_picture'
    ];

}
