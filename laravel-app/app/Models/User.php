<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $authPasswordName = 'password_hash';

    protected $fillable = ['name', 'email', 'password_hash', 'phone'];

    protected $hidden = ['password_hash'];
}
