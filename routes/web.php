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
Route::get('/location/{id}', [LocationController::class, 'getLocation'])->name('get-location')->middleware('auth:web');
Route::get('/wand/{id}', [LocationController::class, 'getWandShop'])->name('get-wand-shop')->middleware('auth:web');
Route::get('/gown/{id}', [LocationController::class, 'getGownShop'])->name('get-gown-shop')->middleware('auth:web');
Route::get('/broom/{id}', [LocationController::class, 'getBroomShop'])->name('get-broom-shop')->middleware('auth:web');
Route::get('/pet/{id}', [LocationController::class, 'getPetShop'])->name('get-pet-shop')->middleware('auth:web');
Route::get('/book/{id}', [LocationController::class, 'getBookShop'])->name('get-book-shop')->middleware('auth:web');
Route::get('/school/{id}', [LocationController::class, 'getSchool'])->name('get-school')->middleware('auth:web');
Route::get('/classroom/{id}', [LocationController::class, 'getClassroom'])->name('get-classroom')->middleware('auth:web');
Route::get('/classroom/quiz/{id}', [LocationController::class, 'getClassroomQuiz'])->name('get-classroom-quiz')->middleware('auth:web');
Route::get('/character', [CharacterController::class, 'character'])->name('get-character')->middleware('auth');

Route::get('/inventory', [CharacterController::class, 'characterInventory'])->name('get-inventory')->middleware('auth:web');
Route::get('/book-inventroy', [CharacterController::class, 'characterBookInventory'])->name('get-book-inventory')->middleware('auth:web');
Route::get('/spells', [CharacterController::class, 'characterSpell'])->name('get-spell')->middleware('auth:web');
Route::post('/shop/wand/update', [BuyController::class, 'updateWand'])->middleware('auth:web');
Route::post('/shop/gown/update', [BuyController::class, 'updateGown'])->middleware('auth:web');
Route::post('/shop/broom/update', [BuyController::class, 'updateBroom'])->middleware('auth:web');
Route::post('/shop/pet/update', [BuyController::class, 'updatePet'])->middleware('auth:web');
Route::post('/shop/item/update', [BuyController::class, 'updateItem'])->middleware('auth:web');
Route::post('/shop/item/submit', [BuyController::class, 'submitItem'])->middleware('auth:web');
Route::post('/item/wear', [BuyController::class, 'wearItem'])->middleware('auth:web');
Route::post('/item/delete', [BuyController::class, 'deleteItem'])->middleware('auth:web');
Route::post('/shop/book/submit', [BuyController::class, 'submitBook'])->middleware('auth:web');
Route::post('/shop/book/delete', [BuyController::class, 'deleteBook'])->middleware('auth:web');
Route::post('/lesson/submit', [LocationController::class, 'submitLesson'])->middleware('auth:web');
Route::post('/lesson/delete', [LocationController::class, 'deleteLesson'])->middleware('auth:web');
Route::post('/quiz/submit', [LocationController::class, 'quizSubmit'])->middleware('auth:web');

Route::get('/period', [PeriodController::class, 'currentPeriod'])->name('get-current-period')->middleware('auth');
Route::get('/period/past', [PeriodController::class, 'pastPeriodInfo'])->name('get-past-period-info')->middleware('auth');
Route::get('/period/detail/{id}', [PeriodController::class, 'periodDetailInfo'])->name('get-period-detail-info')->middleware('auth');
Route::get('/period/all', [PeriodController::class, 'periodAllInfo'])->name('get-period-all-info')->middleware('auth');

require __DIR__.'/auth.php';
