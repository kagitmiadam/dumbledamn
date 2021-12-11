<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

Route::get('/', function () {return view('homepage.index');})->name('get-homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/sorting-hat', [CharacterController::class, 'sortingHat'])->name('get-sorting-hat')->middleware('auth');
Route::post('/sorting-hat/submit', [CharacterController::class, 'submitSortingHat'])->middleware('auth');
Route::get('/select-wand', [CharacterController::class, 'selectWand'])->name('get-select-wand')->middleware('auth');
Route::post('/select-wand/submit', [CharacterController::class, 'submitSelectWand'])->middleware('auth');

Route::get('/homepage', [CharacterController::class, 'homepage'])->name('get-auth-homepage')->middleware('auth');

require __DIR__.'/auth.php';