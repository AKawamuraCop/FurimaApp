<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
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
// });

Route::get('/',[ItemController::class, 'index']);
Route::get('/item/{item_id}', [ItemController::class,'getDetail']);
Route::get('/register', [UserController::class,'getRegister']);
Route::get('/login',[UserController::class,'getLogin']);
Route::get('/search',[ItemController::class,'search']);

// Route::get('/profile', function () {
//     return view('profile'); // 実際のプロフィール画面のビューを指定
// })->middleware(['auth', 'verified'])->name('profile');
//Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::middleware('auth','verified')->group(function(){
    Route::get('/profile',[UserController::class,'getProfile']);
    Route::post('/like/{item_id}', [FavoriteController::class, 'create'])->name('like');
    Route::post('/unlike/{item_id}', [FavoriteController::class, 'delete'])->name('unlike');
    Route::post('/comment',[CommentController::class,'create']);
});