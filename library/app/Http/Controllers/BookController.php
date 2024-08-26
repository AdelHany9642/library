<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $books = Book::all();
        return view('dashboard.books.list', ['books' => $books]);
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
    public function store(StoreBookRequest $request): \Illuminate\Http\RedirectResponse
    {
        Book::create($request->validated());

        return redirect()->route('dashboard.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $book = Book::findOrFail($id);
        return view('dashboard.books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $book = Book::findOrFail($id);
        return view('dashboard.books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $book = Book::findOrFail($id);

        $book->update($request->validated());

        return redirect()->route('dashboard.index', ['dashboard' => $id])
            ->with('success', 'Book Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        Book::destroy($id);
        return redirect('/dashboard');
    }
}
