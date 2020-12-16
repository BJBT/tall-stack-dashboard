<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashController::class, 'index'])->name('dash');
