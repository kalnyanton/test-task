<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterController::class, 'home'])->name('account.register-form');
Route::post('/', [RegisterController::class, 'register'])->name('account.register-action');
Route::post('/deactivate/{link}', [RegisterController::class, 'deactivate'])->name('account.deactivate');
Route::post('/regenerate/{link}', [RegisterController::class, 'regenerate'])->name('account.regenerate');

Route::get('/game/{link}', [GameController::class, 'page'])->name('game.page');
Route::get('/game/history/{link}', [GameController::class, 'history'])->name('game.history');
Route::get('/game/feeling-lucky/{link}', [GameController::class, 'feelingLucky'])->name('game.feeling-lucky');
