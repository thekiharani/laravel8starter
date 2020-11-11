<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('change_password', [App\Http\Controllers\Auth\PasswordController::class, 'index'])->name('get.change_password');
Route::patch('change_password', [App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('patch.change_password');
