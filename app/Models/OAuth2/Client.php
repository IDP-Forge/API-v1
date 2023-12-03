<?php

namespace App\Models\OAuth2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'oauth2_client';

    protected $fillable = [
        'application_id',
        'client_type',
        'client_id',
        'client_secret',
        'title',
        'description',
    ];
}
