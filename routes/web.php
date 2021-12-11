<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\HomepageController;

Route::get('/', [HomepageController::class, 'index'])->name('get-homepage');


Route::get('/homepage', function () {
    return view('auth-homepage.homepage.index');
})->middleware(['auth'])->name('dashboard');

Route::get('/sorting-hat', [CharacterController::class, 'sortingHat'])->name('get-sorting-hat')->middleware('auth');
Route::post('/sorting-hat/submit', [CharacterController::class, 'submitSortingHat'])->middleware('auth');
Route::get('/select-wand', [CharacterController::class, 'selectWand'])->name('get-select-wand')->middleware('auth');
Route::post('/select-wand/submit', [CharacterController::class, 'submitSelectWand'])->middleware('auth');

Route::get('/homepage', [CharacterController::class, 'homepage'])->name('get-auth-homepage')->middleware('auth');
Route::get('/location/{id}', 'LocationController@getLocation')->name('get-location');

require __DIR__.'/auth.php';
