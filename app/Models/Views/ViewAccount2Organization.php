<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewAccount2Organization extends Model
{
    use HasFactory;

    protected $table = 'view_accounts2organizations';

    protected $casts = [
        'additional' => 'array',
        'history' => 'array',
        'attempts' => 'array',
        'messages' => 'array',
        'attributes' => 'array'
    ];
}
