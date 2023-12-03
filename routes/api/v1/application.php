<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Applications;

Route::get('/application/types', [Applications::class, 'getAppTypes']);
