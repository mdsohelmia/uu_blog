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

Route::get('users', [UserController::class, 'index'])->name('user.list');
Route::get('users/create', [UserController::class, 'create'])->name('user.create');
Route::post('users/create', [UserController::class, 'store'])->name('user.store');
