<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Protocols;

/**
 * Prefix: /api/v1
 */

Route::get('/protocols', [Protocols::class, 'listing']);
