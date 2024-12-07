<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\SellController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });F

Route::get('/',[ItemController::class, 'index']);
Route::get('/item/{item_id}', [ItemController::class,'getDetail']);
Route::get('/register', [UserController::class,'getRegister']);
Route::get('/login',[UserController::class,'getLogin'])->name('login');;
Route::get('/search',[ItemController::class,'search']);

Route::middleware('auth','verified')->group(function(){
    Route::get('/profile',[ProfileController::class,'getProfile']);
    Route::post('/profile',[ProfileController::class,'postProfile']);
    Route::post('/like/{item_id}', [FavoriteController::class, 'create'])->name('like');
    Route::post('/unlike/{item_id}', [FavoriteController::class, 'delete'])->name('unlike');
    Route::post('/comment',[CommentController::class,'create']);
    Route::get('/mypage',[MypageController::class,'getMypage']);
    Route::post('/purchase/{item_id}',[PurchaseController::class,'getPurchase']);
    Route::get('purchase/address/{item_id}',[PurchaseController::class, 'getAddress'])->name('purchase.address');
    Route::post('update/address',[PurchaseController::class, 'postAddress'])->name('update.address');
    Route::get('/sell',[SellController::class,'getSell']);
    Route::post('/sell',[SellController::class,'postSell']);
});