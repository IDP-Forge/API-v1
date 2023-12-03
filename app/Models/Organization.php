<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organizations';

    protected $fillable = [
        'unique_id',
        'parent_id',
        'active',
        'title',
        'description',
        'metadata',
    ];

    public $timestamps = true;

    protected $casts = [
        'metadata' => 'array'
    ];
}
