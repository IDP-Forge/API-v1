<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'internal',
        'status_id',
        'policy_id',
        'username',
        'password',
        'username_readable',
        'first_name',
        'last_name',
        'email',
        'additional',
        'history',
        'attempts',
        'messages',
        'created_at',
        'updated_at',
        'expires_at',
        'last_login_at',
        'password_changed_at',
        'locked_at',
        'unlocked_at',
    ];
}
