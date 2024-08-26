<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Http\Requests\StoreBorrowedBookRequest;
use App\Http\Requests\UpdateBorrowedBookRequest;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $borrowedBooks = BorrowedBook::with(['book', 'student'])->get();
        return view('dashboard.borrowedbooks.list', compact('borrowedBooks'));
    }
}
