<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account2Role extends Model
{
    use HasFactory;

    protected $table = 'accounts2roles';

    protected $fillable = [
        'account_id',
        'role_id'
    ];
}
