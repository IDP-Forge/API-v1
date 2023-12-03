<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\OAuth2;

Route::get('/oauth2/authorize', [OAuth2::class, 'processAuthorizationRequest']);
