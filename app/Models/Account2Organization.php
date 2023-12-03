<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account2Organization extends Model
{
    use HasFactory;

    protected $table = 'accounts2organizations';

    protected $casts = [
        'attributes' => 'array'
    ];
}
