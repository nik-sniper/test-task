<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageAController;
use App\Http\Middleware\CheckExpiredAtLink;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/page/{link}', [PageAController::class, 'show'])
    ->middleware(CheckExpiredAtLink::class)
    ->name('link.show');

