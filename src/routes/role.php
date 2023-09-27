<?php

use Illuminate\Support\Facades\Route;
use Hiren\ApiPlatform\Controllers\RoleController;

Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index']);
});