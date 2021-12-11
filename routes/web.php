<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LocationController;

Route::get('/', [HomepageController::class, 'index'])->name('get-homepage');

Route::get('/sorting-hat', [CharacterController::class, 'sortingHat'])->name('get-sorting-hat')->middleware('auth');
Route::post('/sorting-hat/submit', [CharacterController::class, 'submitSortingHat'])->middleware('auth');
Route::get('/select-wand', [CharacterController::class, 'selectWand'])->name('get-select-wand')->middleware('auth');
Route::post('/select-wand/submit', [CharacterController::class, 'submitSelectWand'])->middleware('auth');

Route::get('/homepage', [CharacterController::class, 'homepage'])->name('get-auth-homepage')->middleware('auth:web');
Route::get('/location/{id}', [LocationController::class, 'getLocation'])->name('get-location');
Route::get('/character', [CharacterController::class, 'character'])->name('get-character')->middleware('auth');

// Dönem Kupası
// Mevcut Dönem Bilgileri
Route::get('/period', [PeriodController::class, 'currentPeriod'])->name('get-current-period')->middleware('auth');
// Tüm Geçmiş Dönem Bilgileri
Route::get('/period/past', [PeriodController::class, 'pastPeriodInfo'])->name('get-past-period-info')->middleware('auth');
// Geçmiş Dönem Kupası Detayları
Route::get('/period/detail/{id}', [PeriodController::class, 'periodDetailInfo'])->name('get-period-detail-info')->middleware('auth');
// Tüm Dönem Kupalarının Toplam Detayları
Route::get('/period/all', [PeriodController::class, 'periodAllInfo'])->name('get-period-all-info')->middleware('auth');

require __DIR__.'/auth.php';
