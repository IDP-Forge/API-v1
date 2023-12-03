<?php

use App\Http\Controllers\API\v1\UI;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Menu;

/**
 * Prefix: /api/v1
 */

Route::get('/ui/menu', [Menu::class, 'menu']);
Route::get('/ui/idp/listing/table/headers', [UI::class, 'getIdPTableHeaders']);
