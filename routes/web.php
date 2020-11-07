<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'home';
});

Route::get('dashboard', [DashboardController::class, 'showDashboard'])->name('admin.dashboard');
Route::get('posts', [PostController::class, 'index'])->name('admin.post');


Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('list');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('create', [UserController::class, 'store'])->name('store');
    Route::post('{id}/update', [UserController::class, 'update'])->name('update');
    Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');

}); 


