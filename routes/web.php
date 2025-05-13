<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', fn() => view('index'));
Route::get('/dashboard', [DashboardController::class, 'show']);
