<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application2ProtocolMetadata extends Model
{
    use HasFactory;

    protected $table = 'application2protocol_metadata';

    public $timestamps = false;

    protected $fillable = [
        'unique_id',
        'application_id',
        'protocol_id',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];
}
