<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\BorrowRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * BookController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $books = Book::ofUser()->when(
            $request->query('borrowed'),
            fn ($query) => auth()->user()->isAdmin()
                            ? $query->has('students', '>', 0)
                            : $query->whereHas('students', fn ($query) => $query->where('user_id', auth()->id())->whereNull('returned_at'))
        )->paginate();

        return view('dashboard.books.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('dashboard.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request): \Illuminate\Http\RedirectResponse
    {
        Book::create($request->validated());

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('dashboard.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('dashboard.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book): \Illuminate\Http\RedirectResponse
    {
        $book->update($request->validated());

        return redirect()->route('books.show', $book)
            ->with('success', 'Book Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index');
    }

    /**
     * Borrow the specified resource.
     */
    public function borrow(BorrowRequest $request, Book $book)
    {
        $this->authorize('borrow', $book);

        $book->students()->syncWithoutDetaching([
            auth()->id() => [
                'due_date' => $request->input('due_date'),
                'returned_at' => null,
            ],
        ]);

        return redirect()
                ->route('books.index')
                ->with('success', 'Book Borrowed Successfully.');
    }

    /**
     * Return the specified resource.
     */
    public function return(Book $book)
    {
        $this->authorize('return', $book);

        $book->students()->updateExistingPivot(auth()->id(), [
            'returned_at' => now(),
        ]);

        return back();
    }
}
