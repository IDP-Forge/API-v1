<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewApplication extends Model
{
    use HasFactory;

    protected $table = 'view_application';

    protected $casts = [
        'config' => 'array',
        'metadata' => 'array'
    ];

    public static function findByUniqueID(string $value): self
    {
        return static::where('unique_id', hash('sha256', $value))->firstOrFail();
    }
}
