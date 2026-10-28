<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/books/feature', [BookController::class, 'feature'])
    ->name('books.feature');

Route::get('/books/filter/{genre?}', function (?string $genre = null){
    return redirect()->route('books.index', $genre ? ['genre' => $genre] : []);
})->name('books.filter');

Route::resource('books', BookController::class);

Route::get('/teachers/featured', [TeacherController::class, 'featured'])
     ->name('teachers.featured');

Route::resource('teachers', TeacherController::class)
     ->only(['index', 'show']);