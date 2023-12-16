<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    public $fillable = [
        'provider_id',
        'protocol_id',
        'active',
        'title',
        'description',
        'config'
    ];

    protected $casts = [
        'config' => 'array'
    ];
}
