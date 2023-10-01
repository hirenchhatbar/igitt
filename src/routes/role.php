<?php

use Illuminate\Support\Facades\Route;
use Hiren\ApiPlatform\Controllers\RoleController;

Route::controller(RoleController::class)->group(function () {
    Route::prefix('roles')->group(function () {
        Route::get('/', 'getCollection');
        Route::get('/{id}', 'get')->whereNumber('id');
        Route::post('/', 'post');
        Route::put('/{id}', 'put')->whereNumber('id');
        Route::delete('/{id}', 'delete')->whereNumber('id');
    });
});