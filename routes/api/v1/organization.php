<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Organization;

/**
 * Prefix: api/v1
 */

Route::get('/organizations',                                [Organization::class, 'listing']);
Route::get('/organization/{id}',                            [Organization::class, 'read']);
Route::post('/organization',                                [Organization::class, 'create']);
Route::put('/organization/{id}',                            [Organization::class, 'update']);
Route::delete('/organization/{id}',                         [Organization::class, 'delete']);
Route::get('/organization/{id}/accounts',                   [Organization::class, 'accounts']);
Route::delete('/organization/{id}/account/{account_id}',    [Organization::class, 'removeAccount']);

Route::get('/organization/{id}/roles',                      [Organization::class, 'roles']);
Route::post('/organization/{id}/role',                      [Organization::class, 'createRole']);
Route::get('/organization/{id}/account/{account_id}/roles', [Organization::class, 'accountRoles']);
Route::get('/organization/{id}/permissions',                [Organization::class, 'permissions']);
Route::post('/organization/{id}/permission',                [Organization::class, 'createPermission']);

Route::get('/organization/{id}/children',                   [Organization::class, 'children']);
