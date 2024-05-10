<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\BookRatingController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




/////////////////////////////////AUTH/////////////////////////////////////////////

    

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
/////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////USER///////////////////////////////////////////////
Route::get('/book', [BookController::class,'index']);
    Route::post('/favorites', [BookController::class,'add']);
    Route::get('/showfavorite', [BookController::class,'showFavorite']);
    Route::post('/rate', [BookRatingController::class, 'rate']);
    Route::get('/books/{bookId}/ratings', [BookRatingController::class,'getBookRatings']);
/////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////VISITOR///////////////////////////////////////////
Route::get('/filter', [BookController::class, 'filterBooks']);

///////////////////////////////////////////////////////////////////////////////////


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
