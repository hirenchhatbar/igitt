<?php

use Illuminate\Support\Facades\Route;
use Hiren\Igitt\Controllers\RoleController;

Route::controller(RoleController::class)->group(function () {
    Route::prefix('roles')->group(function () {
        Route::get('/', 'getCollection')->middleware('get.collection');
        Route::get('/{id}', 'get')->whereNumber('id');
        Route::post('/', 'post');
        Route::put('/{id}', 'put')->whereNumber('id');
        Route::delete('/{id}', 'delete')->whereNumber('id');
    });
});