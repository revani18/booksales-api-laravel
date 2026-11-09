<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Authentication
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');


// Books: read dapat diakses publik
Route::apiResource('/books', BookController::class)
    ->only(['index', 'show']);

// Author: read dapat diakses publik
Route::apiResource('/authors', AuthorController::class)
    ->only(['index', 'show']);

// Genre: read dapat diakses publik
Route::apiResource('/genres', GenreController::class)
    ->only(['index', 'show']);


// Perubahan data
// Customer: membuat, melihat detail, dan mengubah transaksi
Route::middleware(['auth:api', 'role:customer'])->group(function () {
    Route::apiResource('/transactions', TransactionController::class)
        ->only(['store', 'show']);
});

// Admin: melihat semua transaksi dan menghapus transaksi
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('/transactions', TransactionController::class)
        ->only(['index', 'destroy', 'update']);

    // CRUD buku, author, dan genre khusus admin
    Route::apiResource('/books', BookController::class)
            ->only(['store', 'update', 'destroy']);

    Route::apiResource('/authors', AuthorController::class)
            ->only(['store', 'update', 'destroy']);

    Route::apiResource('/genres', GenreController::class)
        ->only(['store', 'update', 'destroy']);
});
