<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\GameResultController;

Route::prefix('/link')->name('link.')->group(function () {
    Route::post('/{user}/create', [LinkController::class, 'create'])->name('create');
    Route::patch('/{link}/disable', [LinkController::class, 'disable'])->name('disable');
});

Route::prefix('/game-result')->name('game-result.')->group(function () {
    Route::post('/{user}', [GameResultController::class, 'create'])->name('create');
    Route::get('/{user}', [GameResultController::class, 'index'])->name('index');
});
