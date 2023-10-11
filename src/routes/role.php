<?php
/**
 * This file is part of the Igitt package.
 *
 * (c) Hiren Chhatbar <hc.rajkot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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