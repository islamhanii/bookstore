<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiBookController;
use App\Http\Controllers\ApiCatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/show/{id}', [ApiBookController::class, 'show']);
Route::get('/books/search/{keyword}', [ApiBookController::class, 'search']);

Route::get('/cats', [ApiCatController::class, 'index']);
Route::get('/cats/show/{id}', [ApiCatController::class, 'show']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/books/store/', [ApiBookController::class, 'store']);
    Route::post('/books/update/{id}', [ApiBookController::class, 'update']);
    
    Route::post('/cats/store/', [ApiCatController::class, 'store']);
    Route::post('/cats/update/{id}', [ApiCatController::class, 'update']);

    Route::post('/logout', [ApiAuthController::class, 'logout']);

    Route::middleware('deleter')->group(function() {
        Route::get('/books/delete/{id}', [ApiBookController::class, 'delete']);
        Route::get('/cats/delete/{id}', [ApiCatController::class, 'delete']);
    });
});



// adel@shakal.com  =>  2|TC3spxQVzKTD9kUzLWbo1Bmv0SweNiRZujsNlKiu