<?php

use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::resource('/dashboard', BookController::class)->middleware("auth");

// Admin profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/search', [SearchController::class, 'search']);


Route::resource('/students', StudentController::class);


Route::resource('/borrowed', BorrowedBookController::class);


Auth::routes();
