<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Services\UserServices;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BookController;

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
    return view('welcome');
});
        // user route     
        Route::get('/user', [UserController::class, 'index']);
        Route::post('/user/{store_id}', [UserController::class, 'store']);
        Route::get('/user/{id}', [UserController::class, 'show']);
        Route::put('/user/{id}', [UserController::class, 'update']);
        Route::delete('/user/{id}/{store_id}', [UserController::class, 'destroy']);

         // store route     
         Route::get('/store', [StoreController::class, 'index']);
         Route::post('/store', [StoreController::class, 'store']);
         Route::get('/store/{id}', [StoreController::class, 'show']);
         Route::put('/store/{id}', [StoreController::class, 'update']);
         Route::delete('/store/{id}', [StoreController::class, 'destroy']);

         // book route     
         Route::get('/book', [BookController::class, 'index']);
         Route::post('/book/{store_id}', [BookController::class, 'store']);
         Route::get('/book/{id}', [BookController::class, 'show']);
         Route::put('/book/{id}', [BookController::class, 'update']);
         Route::delete('/book/{id}/{store_id}', [BookController::class, 'destroy']);

      
        