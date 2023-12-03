<?php

use App\Http\Controllers\API\v1\IdP;
use Illuminate\Support\Facades\Route;

Route::get('/idp/listing',          [IdP::class, 'listing']);
Route::get('/idp/{id}',             [IdP::class, 'read']);
Route::post('/idp',                 [IdP::class, 'create']);
Route::put('/idp/{id}',             [IdP::class, 'update']);
Route::put('/idp/{id}/deactivate',  [IdP::class, 'deactivate']);
Route::delete('/idp/{id}',          [IdP::class, 'delete']);
