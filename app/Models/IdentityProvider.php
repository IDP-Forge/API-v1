<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentityProvider extends Model
{
    use HasFactory;

    protected $table = 'identity_providers';

    protected $fillable = [
        'type_id',
        'title',
        'description',
        'config',
    ];

    protected $casts = [
        'config' => 'array'
    ];
}
