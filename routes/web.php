<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('role')->group(function () {
    Route::get('/', [RoleController::class, 'index']);
    Route::post('/create', [RoleController::class, 'save'])->name('save_role');
    Route::post('/update', [RoleController::class, 'update'])->name('update_role');
    Route::post('/delete', [RoleController::class, 'delete'])->name('delete_role');
});

Route::prefix('permission')->group(function () {
    Route::post('/create', [PermissionController::class, 'save'])->name('save_permission');
    Route::post('/update', [PermissionController::class, 'update'])->name('update_permission');
    Route::post('/delete', [PermissionController::class, 'delete'])->name('delete_permission');
});

Route::get('list', [ListController::class, 'index']);
