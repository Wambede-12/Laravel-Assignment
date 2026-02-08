<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Redirect home to books list
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Book resource routes (CRUD)
Route::resource('books', BookController::class);
