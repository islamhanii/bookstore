<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/show/{id}', [BookController::class, 'show']);
Route::get('/books/search/{keyword}', [BookController::class, 'search']);

Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books/store', [BookController::class, 'store']);

Route::get('/books/edit/{id}', [BookController::class, 'edit']);
Route::post('/books/update/{id}', [BookController::class, 'update']);

Route::post('/books/delete/{id}', [BookController::class, 'delete']);