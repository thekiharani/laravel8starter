<?php

use App\Http\Controllers\BPController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BPController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
