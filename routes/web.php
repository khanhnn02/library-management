<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', BookController::class);


Route::resource('readers', ReaderController::class);


Route::resource('borrows', BorrowController::class);


Route::get('borrows/history/{id}', [BorrowController::class, 'readerHistory'])->name('borrows.history');