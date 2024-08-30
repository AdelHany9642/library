<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::redirect('/', '/login')->middleware('guest');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');

    Route::resource('books', BookController::class);
    Route::prefix('books/{book}')->name('books.')->group(function () {
        Route::post('borrow', [BookController::class, 'borrow'])->name('borrow');
        Route::post('return', [BookController::class, 'return'])->name('return');
    });

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('students', StudentController::class);
});
