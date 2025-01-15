<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);
Route::post('/sendMail',[BookController::class, "sendEmail"]);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('user', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);
    Route::get('/books',[BookController::class, "getAllBooks"]);
Route::get('/book/{id}',[BookController::class, "getBookByID"]);
Route::post('/book/create',[BookController::class, "createBook"]);
Route::get('/stock/{bookId}',[BookController::class, "getStockByBookID"]);
Route::delete('/delete/{id}',[BookController::class, "deleteBook"]);
Route::patch('/updateStock',[BookController::class, "updateStock"]);
Route::patch('/updateBook',[BookController::class, "updateBook"]);

});
