<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\BuyController;

Route::get('/', [HomepageController::class, 'index'])->name('get-homepage');

Route::get('/sorting-hat', [CharacterController::class, 'sortingHat'])->name('get-sorting-hat')->middleware('auth');
Route::post('/sorting-hat/submit', [CharacterController::class, 'submitSortingHat'])->middleware('auth');
Route::get('/select-wand', [CharacterController::class, 'selectWand'])->name('get-select-wand')->middleware('auth');
Route::post('/select-wand/submit', [CharacterController::class, 'submitSelectWand'])->middleware('auth');

Route::get('/homepage', [CharacterController::class, 'homepage'])->name('get-auth-homepage')->middleware('auth:web');
Route::get('/location/{id}', [LocationController::class, 'getLocation'])->name('get-location');
Route::get('/wand/{id}', [LocationController::class, 'getWandShop'])->name('get-wand-shop');
Route::get('/gown/{id}', [LocationController::class, 'getGownShop'])->name('get-gown-shop');
Route::get('/broom/{id}', [LocationController::class, 'getBroomShop'])->name('get-broom-shop');
Route::get('/pet/{id}', [LocationController::class, 'getPetShop'])->name('get-pet-shop');
Route::get('/book/{id}', [LocationController::class, 'getBookShop'])->name('get-book-shop');
Route::get('/classroom/{id}', [LocationController::class, 'getClassroom'])->name('get-classroom');
Route::get('/character', [CharacterController::class, 'character'])->name('get-character')->middleware('auth');

Route::get('/item', [CharacterController::class, 'characterItem'])->name('get-item');
// Satın Alma İşlemleri
// Asa
Route::post('/shop/wand/update', [BuyController::class, 'updateWand']);
// Pelerin
Route::post('/shop/gown/update', [BuyController::class, 'updateGown']);
// Süpürge
Route::post('/shop/broom/update', [BuyController::class, 'updateBroom']);
// Evcil Hayvan
Route::post('/shop/pet/update', [BuyController::class, 'updatePet']);
// Ekipman (Item)
Route::post('/shop/item/update', [BuyController::class, 'updateItem']);
Route::post('/shop/item/submit', [BuyController::class, 'submitItem']);
// Ekipman Kuşanma
Route::post('/item/wear', [BuyController::class, 'wearItem']);
Route::post('/item/delete', [BuyController::class, 'deleteItem']);
// Kitap
Route::post('/shop/book/submit', [BuyController::class, 'submitBook']);
Route::post('/shop/book/delete', [BuyController::class, 'deleteBook']);

Route::get('/period', [PeriodController::class, 'currentPeriod'])->name('get-current-period')->middleware('auth');
Route::get('/period/past', [PeriodController::class, 'pastPeriodInfo'])->name('get-past-period-info')->middleware('auth');
Route::get('/period/detail/{id}', [PeriodController::class, 'periodDetailInfo'])->name('get-period-detail-info')->middleware('auth');
Route::get('/period/all', [PeriodController::class, 'periodAllInfo'])->name('get-period-all-info')->middleware('auth');

require __DIR__.'/auth.php';
