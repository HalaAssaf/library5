<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::group(['middleware' => ['auth:web']], function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mcategory', [App\Http\Controllers\MainCategoryController::class, 'index'])->name('category.index');
Route::get('/mcreate', [App\Http\Controllers\MainCategoryController::class, 'create'])->name('mcategory.create');
Route::post('/mstore', [App\Http\Controllers\MainCategoryController::class, 'store'])->name('mcategory.store');
Route::get('/screate', [App\Http\Controllers\SubCategoryController::class, 'create'])->name('scategory.create');
Route::post('/sstore', [App\Http\Controllers\SubCategoryController::class, 'store'])->name('scategory.store');
Route::get('/scategory', [App\Http\Controllers\SubCategoryController::class, 'index'])->name('category.subindex');
Route::get('/index', [App\Http\Controllers\BookController::class, 'index'])->name('category.book');
Route::get('/book', [App\Http\Controllers\BookController::class, 'create'])->name('book.create');
Route::post('/book', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');



    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('mcategories', MainCategoryController::class);
    Route::resource('scategories', SubCategoryController::class);
    Route::resource('books',BookController::class);    
    });
